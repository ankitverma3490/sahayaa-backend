<?php

namespace App\Http\Controllers\Api;

use App\Models\KycVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
class KycVerificationController extends Controller
{
    public function updateOrCreateKyc(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'police_verification' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'aadhaar_front' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhaar_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user_id = Auth::guard('api')->user()->id;
            $userData = User::find($user_id);
            $data = ['user_id' => $user_id];

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $data['photo_path'] = $this->handleFileUpload($request->file('photo'), 'uploads/kyc/photos', $user_id, 'photo');
            }

            // Handle police verification upload
            if ($request->hasFile('police_verification')) {
                $data['police_verification_path'] = $this->handleFileUpload($request->file('police_verification'), 'uploads/kyc/police_verifications', $user_id, 'police_verification');
            }

            // Handle Aadhaar front upload
            if ($request->hasFile('aadhaar_front')) {
                $data['aadhaar_front_path'] = $this->handleFileUpload($request->file('aadhaar_front'), 'uploads/kyc/aadhaar', $user_id, 'aadhaar_front');
            }

            // Handle Aadhaar back upload
            if ($request->hasFile('aadhaar_back')) {
                $data['aadhaar_back_path'] = $this->handleFileUpload($request->file('aadhaar_back'), 'uploads/kyc/aadhaar', $user_id, 'aadhaar_back');
            }

            // Update or create KYC verification record
            $kycVerification = KycVerification::updateOrCreate(
                ['user_id' => $user_id],
                $data
            );

            DB::commit();
            $userData->update(['step' => 3]);
            return response()->json([
                'status' => true,
                'userData' => $userData,
                'message' => 'KYC documents uploaded successfully',
                'data' => $kycVerification,
                
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'status' => false,
                'userData' => $userData,
                'message' => 'Failed to upload KYC documents: ' . $e->getMessage()
            ], 500);
        }
    }

    private function handleFileUpload($file, $directory, $user_id, $type)
    {
        // Create directory if it doesn't exist
        if (!file_exists(public_path($directory))) {
            mkdir(public_path($directory), 0755, true);
        }

        // Generate unique file name
        $extension = $file->getClientOriginalExtension();
        $fileName = $user_id . '_' . $type . '_' . time() . '_' . uniqid() . '.' . $extension;
        
        // Move file to directory
        $file->move(public_path($directory), $fileName);
        
        $path = $directory . '/' . $fileName;

        // Delete old file if exists (for update scenario)
        $this->deleteOldFile($user_id, $type, $path);

        return $path;
    }

    private function deleteOldFile($user_id, $type, $newPath)
    {
        $kyc = KycVerification::where('user_id', $user_id)->first();
        
        if (!$kyc) return;

        $oldPath = null;
        $fieldName = '';

        switch ($type) {
            case 'photo':
                $oldPath = $kyc->photo_path;
                $fieldName = 'photo_path';
                break;
            case 'police_verification':
                $oldPath = $kyc->police_verification_path;
                $fieldName = 'police_verification_path';
                break;
            case 'aadhaar_front':
                $oldPath = $kyc->aadhaar_front_path;
                $fieldName = 'aadhaar_front_path';
                break;
            case 'aadhaar_back':
                $oldPath = $kyc->aadhaar_back_path;
                $fieldName = 'aadhaar_back_path';
                break;
        }

        // Delete old file if it exists and is different from new file
        if ($oldPath && $oldPath !== $newPath && file_exists(public_path($oldPath))) {
            unlink(public_path($oldPath));
        }
    }

    // Additional function to get KYC status
    public function getKycStatus(Request $request, $user_id)
    {
        try {
            $kyc = KycVerification::where('user_id', $user_id)->first();

            if (!$kyc) {
                return response()->json([
                    'status' => false,
                    'message' => 'KYC verification not found for this user',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'KYC status retrieved successfully',
                'data' => $kyc
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve KYC status: ' . $e->getMessage()
            ], 500);
        }
    }
}