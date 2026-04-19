<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use App\Models\LastWorkExperience;
use App\Models\Order;
use App\Models\PortfolioImage;
use App\Models\Service;
use App\Models\SubService;
use App\Models\UserHouseholdInformation;
use App\Models\Wishlist;
use App\Models\Booking;
use App\Models\UserAddress;
use Carbon\Carbon; 
use App\Models\UserWorkInfo;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Designation;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\LeaveRequest;
use App\Models\ReferralReward;
use App\Traits\ImageUpload;
use App\Traits\SmsCountryTrait;
use App\Models\SubscriptionUser;
use App\Models\Subscription;
class UserController extends Controller
{
    use ImageUpload,SmsCountryTrait;

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'business_name' => 'string|max:255|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Format phone number to E.164
        $to = '+91' . ltrim($request->phone_number, '0');

        // Check if phone number already exists
        $user = User::where('phone_number', $request->phone_number)->where('is_deleted', 0)->first();

        // Static OTP for all numbers (for now)
        // $verificationCode = '123456';
        $otp = rand(100000, 999999);
        $response = $this->sendOtp(str_replace('+', '', $to),$otp);
        // dd($response);
        if ($user) {
            // Update existing user's name if provided
            $updateData = [
                'verification_code' => $otp,
                'verification_code_sent_time' => now(),
            ];
            if ($request->filled('name')) {
                $updateData['name'] = $request->name;
            }
            $user->update($updateData);
        } else {
            $user = User::create([
                'name' => $request->name ?? 'User',
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'verification_code' => $otp,
                'verification_code_sent_time' => now(),
                'user_role_id' => $request->role_id,
            ]);

            Notification::create([
                'user_id' => $user->id,
                'title' => 'User Registered',
                'message' => 'Wel come to the our team.',
                'status' => 'unread',
            ]);
        }


        return response()->json([
            'message' => 'Verification code sent to your Phone Number',
            'user_id' => $user->id
        ]);
    }

  public function saveLastWorkExperience(Request $request)
    {
        $user = Auth::guard('api')->user();
        $validated = $request->validate([
            'id' => 'nullable',
            'role' => 'nullable',
            'join_date' => 'nullable',
            'end_date' => 'nullable',
            'salary' => 'nullable',
            'working_hours' => 'nullable',
            'house_sold' => 'nullable',
            'owner_name' => 'nullable',
            'contact_number' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
        ]);
        $data = [
            'user_id' => $user->id,
            'role' => $validated['role'] ?? null,
            'join_date' => $validated['join_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'salary' => $validated['salary'] ?? null,
            'working_hours' => $validated['working_hours'] ?? null,
            'house_sold' => $validated['house_sold'] ?? 0,
            'owner_name' => $validated['owner_name'] ?? null,
            'contact_number' => $validated['contact_number'] ?? null,
            'state' => $validated['state'] ?? null,
            'city' => $validated['city'] ?? null,
        ];
    $user->update(['step' => 6]);

        $experience = LastWorkExperience::updateOrCreate(
            ['id' => $validated['id'] ?? null, 'user_id' => $user->id],
            $data
        );

        return response()->json([
            'success' => true,
            'message' => !empty($validated['id'])
                ? 'Work experience updated successfully'
                : 'Work experience added successfully',
            'data' => $experience
        ]);
    }
 
public function deleteAcc()
{
    $userId = Auth::guard('api')->user()->id;

  
    $user = User::find($userId);

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'User not found'
        ], 404);
    }

    // Mark as deleted (soft delete with in_deleted flag)
    $user->is_deleted = 1;
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Account deleted successfully'
    ]);
}


public function deleteAccUser($id)
{
    $userId = $id;

  
    $user = User::find($userId);

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'User not found'
        ], 404);
    }

    // Mark as deleted (soft delete with in_deleted flag)
    $user->is_deleted = 1;
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Account deleted successfully'
    ]);
}


public function loginCustomer(Request $request)
{
    $validator = Validator::make($request->all(), [
        'phone_number' => 'required|string|max:20',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Format phone number to E.164 format
    $to = '+91' . ltrim($request->phone_number, '0');

    // Development/test numbers
    $devNumbers = [
        '+919782488408',
        '+917020916535',
        '+919001136061',
        '+919509993036',
    ];

    $songName = $request->all();
$filename = fopen('logs.txt', "a+");
fwrite($filename, json_encode($songName, JSON_PRETTY_PRINT) . PHP_EOL);
fclose($filename);
    // Find user by phone number
    $user = User::where('phone_number', $request->phone_number)
                ->where('is_deleted', 0)
                ->first();

    if (!$user) {
        return response()->json([
            'status'  => false,
            'message' => 'User not found. Please sign up first.'
        ], 404);
    }
    
    // Always use fixed code 123456
    // $verificationCode = 123456;
    $verificationCode = rand(100000, 999999);
    $response = $this->sendOtp(str_replace('+', '', $to),$verificationCode);
    
    // Update verification code and time
    $user->update([
        'verification_code'           => $verificationCode,
        'verification_code_sent_time' => now(),
      //  'country_code'                => $request->country_code,
    ]);



    // --- Send OTP (optional) ---
    // Uncomment if you want to send SMS using Twilio
    /*
    if (!in_array($to, $devNumbers)) {
        try {
            $sid   = env('TWILIO_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $from  = env('TWILIO_PHONE_NUMBER');
            $url   = "https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json";

            $response = \Http::withBasicAuth($sid, $token)->asForm()->post($url, [
                'From' => $from,
                'To'   => $to,
                'Body' => "Your login verification code for QuickMySlot (QMS) is {$verificationCode}. It expires in 10 minutes."
            ]);

            $data = $response->json();

            \App\Models\SmsLog::create([
                'user_id' => $user->id,
                'to'      => $to,
                'from'    => $from,
                'message' => "Your login verification code for QuickMySlot (QMS) is {$verificationCode}.",
                'status'  => $data['status'] ?? 'sent',
                'sid'     => $data['sid'] ?? null,
                'sent_at' => now(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Login OTP SMS failed: '.$e->getMessage());
        }
    }
    */

    return response()->json([
        'status'  => true,
        'message' => 'OTP sent successfully',
        'user_id' => $user->id,
        'otp'     => $verificationCode, // optional, for testing
    ]);
}


public function signUpCustomer(Request $request)
{ 
    $validator = Validator::make($request->all(), [
        'name'         => 'nullable|string|max:255',
        //'email'        => 'nullable|email|unique:users,email',
        'phone_number' => 'required|string|max:20',
        'location'     => 'nullable|string|max:255',
        'lat'         => 'nullable',
        'long'        => 'nullable',
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    // Format phone number to E.164
    $to = '91' . ltrim($request->phone_number, '0');

    // Development/test numbers
    $devNumbers = [
        '+919782488408',
      //  '+917976114618',
        '+917020916535',
        '+919001136061',
        '+919509993036',
     // Add your other test numbers here
    ];

    // Check if phone number already exists
    $user = User::where('phone_number', $request->phone_number)->where('is_deleted',0)->first();
    
    // $verificationCode = "123456";
    // // dd($to,$verificationCode);
    // $code = $this->sendSms($to, $verificationCode);
    // dd("ASdas",$code);
    $otp = rand(100000, 999999);
    $response = $this->sendOtp($to,$otp);
    $verificationCode = $otp;
    if (true) { // Force static OTP for all users (SMS Disabled)
        
        if ($user) {
            $user->update([
                'verification_code'           => $otp,
                'verification_code_sent_time' => now(),
            ]);
        } else {
            $user = User::create([
                'name'                          => $request->name ?? 'User',
                'email'                         => $request->email ?? '',
                'phone_number'                  => $request->phone_number,
                'location'                      => $request->location,
                'lat'                           => $request->lat,
                'long'                          => $request->long,
                'user_role_id'                  => 3, // Assuming 3 is houseowner role
                'verification_code'             => $verificationCode, //verificationCode,
                'verification_code_sent_time'   => now(),
                'country_code'                  => $request->country_code,
            ]);
        }
    } else {
        // Real number → generate random OTP
        // $verificationCode = rand(100000, 999999);
        if ($user) {
            $user->update([
                'verification_code'           => $verificationCode,
                'verification_code_sent_time' => now(),
            ]);
        } else {
            $user = User::create([
                'name'                          => $request->name,
                'email'                         => $request->email,
                'phone_number'                  => $request->phone_number,
                'location'                      => $request->location,
                'lat'                           => $request->lat,
                'long'                          => $request->long,
                'user_role_id'                  => 3,
                'verification_code'             => $verificationCode, //verificationCode,
                'verification_code_sent_time'   => now(),
                'country_code'                  => $request->country_code,
            ]);
        }
    }

    

    return response()->json([
        'status'  => true,
        'message' => 'OTP sent successfully',
        'user_id' => $user->id
    ]);
}

public function getProfile(Request $request)
{
    try {
        $user = Auth::guard('api')->user();
        $userDetails = User::with(['addresses','petDetails','lastExp','householdInformation','kycInformation','userWorkInfo','addedByUser', 'addedByUser.addresses',
            'addedByUser.petDetails',
            'addedByUser.lastExp',
            'addedByUser.householdInformation',
            'addedByUser.kycInformation',
            'addedByUser.userWorkInfo'])->find($user->id);

        $attendanceSummary = DB::table('attendance')
        ->select('status', DB::raw('COUNT(*) as total'))
        ->where('staff_id', $user->id)
        ->groupBy('status')
        ->get();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }
        // Return user data without sensitive information
        return response()->json([
            'success' => true,
            'message' => 'Profile retrieved successfully',
            'data' => $userDetails,
            'attendanceSummary' => $attendanceSummary
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to retrieve profile',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = User::find(Auth::guard('api')->user()->id);

            

            // // Check if reset code is expired
            // $expiryTime = $user->password_reset_code_sent_at->addMinutes(10);
            // if (now()->gt($expiryTime)) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Reset code has expired'
            //     ], 422);
            // }

            // Update password and clear reset code
            $user->password = Hash::make($request->password);
            $user->save();

            // Invalidate all existing tokens (optional)
            $user->tokens()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Password reset successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reset password',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) { 
            $request->user()->token()->revoke();
        }
        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ], 200);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'email_or_phone' => 'required',
                    'password'       => 'required|min:8',
                ],
                [
                    'email_or_phone.required' => "This field is required.",
                    'password.required'       => "This field is required.",
                    'password.min'            => "Password must be at least 8 characters.",
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "msg"    => "Input field is required.",
                    "errors" => $validator->errors()
                ], 422);
            }

            // Check whether input is email or phone
            $loginField = $request->email_or_phone;
            if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
                // Login using email
                $user = User::where('email', $loginField)->first();
            } else {
                // Login using phone number
                $user = User::where('phone_number', $loginField)->first();
            }

            if (!empty($user) && Hash::check($request->password, $user->password)) {
                try {
                    $token = $user->createToken('AuthToken')->accessToken;
                    
                    return response()->json([
                        "status" => "success",
                        "msg"    => "You are now logged in.",
                        "token"  => $token,
                        "user"   => $user
                    ], 200);
                } catch (\Exception $e) {
                    if (strpos($e->getMessage(), 'Personal access client not found') !== false) {
                        return response()->json([
                            "status" => "error",
                            "msg"    => "Authentication system not properly configured. Please contact support."
                        ], 500);
                    }

                    return response()->json([
                        "status" => "error",
                        "msg"    => "An error occurred during authentication."
                    ], 500);
                }
            }

            return response()->json([
                "status" => "error",
                "msg"    => "Your email/phone or password is incorrect."
            ], 401);
        }
    }



    public function verifyOtp(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'otp' => 'required|digits:6'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $user = User::find($request->user_id);
        
        if ($user->is_deleted == 1) {
            return response()->json([
                'error' => 'This account has been deleted. Please contact support.'
            ], 403);
        }
        
        // Check if OTP matches the static code (123456)
        if ((string)$request->otp === (string)$user->verification_code) {
            
            // Expiration check disabled...

            try {
                
                // return \DB::transaction(function () use ($user) {
                    $user->update([
                        'is_verified' => 1,
                        'verification_code' => null,
                        'verification_code_sent_time' => null,
                        'updated_at' => now(),
                    ]);
                    
                    
                    // Create Passport token
                    $userData = User::find($request->user_id);
                    $token = $userData->createToken('AuthToken')->plainTextToken;

                    // Login user into api guard
                    // Auth::guard('api')->setUser($user);

                    $subscription = Subscription::where('role_id', 3)->orderBy('price', 'asc')->first();
                    if ($subscription) {
                        SubscriptionUser::updateOrCreate(
                            ['user_id' => $user->id], // condition (unique key)
                            [
                                'subscription_id' => $subscription->id,
                                'start_date' => now(),
                                'end_date' => now()->addDays($subscription->validity ?? 30),
                            ]
                        );
                    }

                    return response()->json([
                        'message' => 'Logged in successfully',
                        'user' => $user,
                        'token' => $token
                    ]);
                // });

            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Login Failed: ' . $e->getMessage()
                ], 500);
            }
        }



        return response()->json([
            'error' => 'Invalid verification code',
            'debug_sent' => $request->otp,
            'debug_stored' => $user->verification_code,
        ], 422);
    }


    public function aadharVerifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::find($request->user_id ?? Auth::guard('api')->user()->id);
        // if ($user->is_deleted == 1) {
        //     return response()->json([
        //         'error' => 'This account has been deleted. Please contact support.'
        //     ], 403);
        // }

        if ($user->aadhar__verify_otp != $request->otp) {
                return response()->json(['error' => 'Invalid otp'], 422);
            }

        // Check if OTP matches the static code (123456)
            
            // Check if OTP is expired (10 minutes validity)
            $expirationTime = 10; // minutes
            // if (now()->diffInMinutes($user->aadhar_number_otp_expire_at) > $expirationTime) {
            //     return response()->json(['error' => 'Verification code has expired'], 422);
            // }

            $user->update([
                'aadhar__verify' => 1,
                'aadhar__verify_otp' => null,
                'aadhar_number_otp_expire_at' => null,
                'aadhar_number_otp_expire_at' => now(),
            ]);
        //  dd($user);

            // Create Passport token
            // $token = $user->createToken('AuthToken')->accessToken;

            // Login user into api guard

            return response()->json([
                'message' => 'Verify in successfully',
                'user' => $user,
            ]);

        return response()->json(['error' => 'Invalid verification code'], 422);
    }



    public function overview()
    {
        try {
            // Only active users that are not deleted
            $totalCustomers = User::where('is_deleted', 0)
                                ->where('is_active', 1)
                                ->count();

            $totalRevenue = 1200.00;   // static for now
            $reach = "5% ";           // static example
            $footfall = "50 / Day";    // static example

            return response()->json([
                'status' => 'success',
                'message' => 'Performance overview retrieved successfully',
                'data' => [
                    'revenue_this_month' => $totalRevenue,
                    'total_customers' => $totalCustomers,
                    'reach' => $reach,
                    'estimated_footfall' => $footfall,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
        
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('phone_number', $request->phone_number)->where('is_deleted',0)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User with this phone number does not exist.'
            ], 404);
        }

        // Format phone number to E.164
        $to = '+91' . ltrim($request->phone_number, '0');

        // Dev/test numbers
        $devNumbers = [
            '+917339788361',
            '+917733884515',
            '+917020916535',
            '+919001136061',
            '+919509993036',
            // add your other test numbers here
        ];

        // Use fixed code 123456 for ALL numbers for now
        // $verificationCode = 123456;
        $otp = rand(100000, 999999);
        $response = $this->sendOtp(str_replace('+', '', $to),$otp);
        

        // Update user with new code
        $user->update([
            'verification_code' => $otp,
            'verification_code_sent_time' => now(),
            'updated_at' => now()
        ]);
        // SMS Sending Logic (Commented Out)
        /*
        // ...
        */

        return response()->json([
            'message' => 'Verification code resent to your Phone Number',
            'user_id' => $user->id
        ]);
    }

// public function updateProfile(Request $request)
// {
//     try {
//         $user = Auth::guard('api')->user();
        
//         if (!$user) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'User not found'
//             ], 404);
//         }

//         $validator = Validator::make($request->all(), [
//             // Basic Information
//             'first_name' => 'nullable|string|max:255',
//                         'user_role_id' => 'nullable',
//             'last_name' => 'nullable|string|max:255',
//             'name' => 'nullable|string|max:255',
//             'email' => 'nullable|email|unique:users,email,' . $user->id,
//             'phone_number' => 'nullable|string|max:20',
//             'gender' => 'nullable|string|in:male,female,other',
//             'dob' => 'nullable|date',
            
//             // Address Information (multiple addresses)
//             'addresses' => 'nullable|array',
//             'addresses.*.street' => 'required_with:addresses|string',
//             'addresses.*.city' => 'required_with:addresses|string',
//             'addresses.*.state' => 'required_with:addresses|string',
//             'addresses.*.pincode' => 'required_with:addresses|string',
//             'addresses.*.is_primary' => 'nullable|boolean',
            
//             // Household Information
//             'residence_type' => 'nullable|string|max:255',
//             'number_of_rooms' => 'nullable|integer|min:1',
//             'languages_spoken' => 'nullable|array',
//             'adults_count' => 'nullable|integer|min:0',
//             'children_count' => 'nullable|integer|min:0',
//             'elderly_count' => 'nullable|integer|min:0',
//             'special_requirements' => 'nullable|string|max:1000',
            
//             // Pet Details
//             'pet_details' => 'nullable|array',
//             'pet_details.*.pet_type' => 'required_with:pet_details|string|max:255',
//             'pet_details.*.pet_count' => 'required_with:pet_details|integer|min:1',
            
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Validation failed',
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         $data = $validator->validated();

//   $jsonResponse = json_encode($data, JSON_PRETTY_PRINT);

//     // File path inside storage folder
//     $filePath = storage_path('logs/api_response_log.txt');

//     // Open the file for appending (creates file if not exists)
//     $file = fopen($filePath, 'a');

//     if ($file) {
//         fwrite($file, "==== " . date('Y-m-d H:i:s') . " ====\n");
//         fwrite($file, $jsonResponse . "\n\n");
//         fclose($file);
//     } else {
//         // Handle error if file couldn't be opened
//         \Log::error('Could not open log file for writing.');
//     }
//         // Handle profile picture upload
//         if ($request->hasFile('profile_picture')) {
//             $directory = "uploads/user_profile_images";
            
//             if (!file_exists(public_path($directory))) {
//                 mkdir(public_path($directory), 0755, true);
//             }

//             $image = $request->file('profile_picture');
//             $extension = $image->getClientOriginalExtension();
//             $fileName = time() . '_' . uniqid() . '.' . $extension;
//             $image->move(public_path($directory), $fileName);

//             $path = $directory . '/' . $fileName;

//             // Delete old profile picture if exists
//             if ($user->image && file_exists(public_path($user->image))) {
//                 unlink(public_path($user->image));
//             }

//             $data['image'] = $path;
//         }
//         $data['step'] = 2;

//         // Update basic user information
//         $user->update($data);

//         if ($request->hasFile('verification_certificate') 
//         && $request->hasFile('aadhar_front') 
//         && $request->hasFile('aadhar_back')) 
//         {
//             $directory = "uploads/verification_certificate";
        
//             // Create directory if it doesn't exist
//             if (!file_exists(public_path($directory))) {
//                 mkdir(public_path($directory), 0755, true);
//             }
        
//             // Function to handle file upload
//             $uploadFile = function($file) use ($directory) {
//                 $extension = $file->getClientOriginalExtension();
//                 $fileName = time() . '_' . uniqid() . '.' . $extension;
//                 $file->move(public_path($directory), $fileName);
//                 return $directory . '/' . $fileName;
//             };
        
//             // Upload files
//             $verificationCertificatePath = $uploadFile($request->file('verification_certificate'));
//             $aadharFrontPath            = $uploadFile($request->file('aadhar_front'));
//             $aadharBackPath             = $uploadFile($request->file('aadhar_back'));
        
//             // Optionally delete old files if exist
//             if ($user->verification_certificate && file_exists(public_path($user->verification_certificate))) {
//                 unlink(public_path($user->verification_certificate));
//             }
//             if ($user->aadhar_front && file_exists(public_path($user->aadhar_front))) {
//                 unlink(public_path($user->aadhar_front));
//             }
//             if ($user->aadhar_back && file_exists(public_path($user->aadhar_back))) {
//                 unlink(public_path($user->aadhar_back));
//             }
        
//             // Update user with new file paths and step
//             $user->update([
//                 'verification_certificate' => $verificationCertificatePath,
//                 'aadhar_front'             => $aadharFrontPath,
//                 'aadhar_back'              => $aadharBackPath,
//                 'step'                     => 3,
//             ]);
//         }
    
    
//         // Handle multiple addresses
//         if ($request->has('addresses')) {
//             // Delete existing addresses
//             $user->addresses()->delete();
            
//             // Create new addresses
//             foreach ($request->addresses as $address) {
//                 $user->addresses()->create($address);
//             }
//             if($user->user_role_id == 2){
//                 $user->update(['step' => 4]);
//             }else{
//                 $user->update(['step' => 3]);
//             }

//         }

//         // Handle household information
//         if ($request->hasAny(['residence_type', 'number_of_rooms', 'languages_spoken', 'adults_count', 'children_count', 'elderly_count', 'special_requirements'])) {
//             $householdData = $request->only([
//                 'residence_type', 'number_of_rooms', 'languages_spoken', 
//                 'adults_count', 'children_count', 'elderly_count', 'special_requirements'
//             ]);
            
//             if ($user->householdInformation) {
//                 $user->householdInformation()->update($householdData);
//             } else {
//                 $user->householdInformation()->create($householdData);
//             }
//             $user->update(['step' => 4]);
//         }
      
//         // Handle pet details
//         if ($request->has('pet_details')) {
//             // Delete existing pet details
//             $user->petDetails()->delete();
            
//             // Create new pet details
//             foreach ($request->pet_details as $petDetail) {
//                 $user->petDetails()->create($petDetail);
//             }
//             $user->update(['step' => 4]);

//         }
//         // Handle portfolio images
      
//         $user->load(['addresses', 'petDetails', 'householdInformation']);

//         return response()->json([
//             'success' => true,
//             'message' => 'Profile updated successfully',
//             'data' => $user
//         ], 200);

//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Failed to update profile',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }

public function updateProfile(Request $request)
{
    try {
        $user = Auth::guard('api')->user();
        if (!$user) return response()->json(['success' => false, 'message' => 'User not found'], 404);

        if ($request->has('dob') && !empty($request->dob)) {
            try {
                // Try to parse DD-MM-YYYY and convert to YYYY-MM-DD for database
                $dob = $request->dob;
                if (preg_match('/^(\d{2})-(\d{2})-(\d{4})$/', $dob)) {
                    $request->merge(['dob' => \Carbon\Carbon::createFromFormat('d-m-Y', $dob)->format('Y-m-d')]);
                }
            } catch (\Exception $e) {
                // Keep original if parsing fails
            }
        }
        $isEdit = $request->input('is_edit', 0);
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'dob' => 'nullable|date',
            'addresses' => 'nullable|array',
            'addresses.*.street' => 'nullable|string',
            'addresses.*.city' => 'nullable|string',
            'addresses.*.state' => 'nullable|string',
            'addresses.*.pincode' => 'nullable|string',
            'addresses.*.is_primary' => 'nullable|boolean',
            'residence_type' => 'nullable|string|max:255',
            'number_of_rooms' => 'nullable|integer|min:1',
            'adults_count' => 'nullable|integer|min:0',
            'children_count' => 'nullable|integer|min:0',
            'elderly_count' => 'nullable|integer|min:0',
            'special_requirements' => 'nullable|string|max:1000',
            'pet_details' => 'nullable|array',
            'pet_details.*.pet_type' => 'nullable|string|max:255',
            'pet_details.*.pet_count' => 'nullable|integer|min:1',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'languages_spoken' => 'nullable|array',
            'auto_attendence' => 'nullable|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        
        // ✅ Profile picture upload
        if ($request->hasFile('profile_picture')) {
            $folderPath = "uploads/user_profile_images";
            $path = null; // initialize to avoid undefined variable if upload fails
            try {
                $path = $this->uploadCloudary($request,"profile_picture",$folderPath);
            } catch (\Throwable $th) {
                \Log::error('Profile picture upload failed: ' . $th->getMessage());
            }
            if ($path) {
                $data['image'] = $path;
            }
        }
        try {
            if ($request->hasFile('aadhar_front')) {
                // $aadharFrontPath = $request->file('aadhar_front')->store('staff/aadhar', 'public');
                $aadharFrontPath = $this->uploadCloudary($request,"aadhar_front","staff/aadhar");
                $data['aadhar_front'] = $aadharFrontPath;
                
            }
        } catch (\Exception $e) {
            Log::error('Aadhar front photo upload failed');
        }

        try {
            if ($request->hasFile('aadhar_back')) {
                $aadharBackPath = $this->uploadCloudary($request,"aadhar_back","staff/aadhar");
                $data['aadhar_back'] = $aadharBackPath;
            }
        } catch (\Exception $e) {
            Log::error('Aadhar back photo upload failed');
        }

        try {
            if ($request->hasFile('verification_certificate')) {
                // $policeClearancePath = $request->file('police_clearance_certificate')->store('staff/documents', 'public');
                $policeClearancePath = $this->uploadCloudary($request,"verification_certificate","staff/documents");
                $data['verification_certificate'] = $policeClearancePath;
            }
        } catch (\Exception $e) {
            Log::error('Police clearance certificate upload failed');
        }

        $jsonResponse = json_encode($request->user_role_id, JSON_PRETTY_PRINT);

        // File path inside storage folder
        $filePath = storage_path('logs/hj.txt');
    
        // Open the file for appending (creates file if not exists)
        $file = fopen($filePath, 'a');
    
        if ($file) {
            fwrite($file, "==== " . date('Y-m-d H:i:s') . " ====\n");
            fwrite($file, $jsonResponse . "\n\n");
            fclose($file);
        } else {
            // Handle error if file couldn't be opened
            \Log::error('Could not open log file for writing.');
        }
        
        if ($isEdit != 1) $data['step'] = 2;

        // Only update user-table fields (safe subset to avoid issues with extra array fields)
        $userUpdateFields = array_intersect_key($data, array_flip([
            'first_name', 'last_name', 'name', 'email', 'phone_number',
            'gender', 'dob', 'auto_attendence', 'image', 'user_role_id', 'step'
        ]));

        try {
            if (!empty($userUpdateFields)) {
                $user->update($userUpdateFields);
            }
        } catch (\Throwable $th) {
            \Log::error('updateProfile user->update failed: ' . $th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update basic profile fields',
                'error' => $th->getMessage()
            ], 500);
        }

        // saveWorkAndExperience is only for staff (role 2), not household employers
        if ($isEdit == 1 && $user->user_role_id == 2) {
            try {
                $this->saveWorkAndExperience($user, $request, $isEdit);
            } catch (\Throwable $th) {
                \Log::error('saveWorkAndExperience failed: ' . $th->getMessage());
                // non-fatal
            }
        }
        // ✅ Update addresses, pets, and household
        if ($request->has('addresses')) {
            try {
                $user->addresses()->delete();
                foreach ($request->addresses as $address) {
                    if (!is_array($address)) continue;
                    // Skip completely empty addresses
                    $hasData = !empty(array_filter([
                        $address['street'] ?? '',
                        $address['city'] ?? '',
                        $address['state'] ?? '',
                        $address['pincode'] ?? '',
                    ]));
                    if ($hasData) {
                        // Only pass safe/fillable keys
                        $safe = array_intersect_key($address, array_flip([
                            'street', 'city', 'state', 'pincode', 'is_primary'
                        ]));
                        $user->addresses()->create($safe);
                    }
                }
                if ($isEdit != 1) {
                    $user->update(['step' => $user->user_role_id == 2 ? 4 : 3]);
                }
            } catch (\Throwable $th) {
                \Log::error('updateProfile addresses save failed: ' . $th->getMessage());
                // non-fatal - don't fail the whole request
            }
        }

        if ($request->hasAny(['residence_type', 'number_of_rooms', 'adults_count', 'children_count', 'elderly_count', 'special_requirements', 'languages_spoken'])) {
            try {
                $householdData = $request->only(['residence_type', 'number_of_rooms', 'adults_count', 'children_count', 'elderly_count', 'special_requirements','languages_spoken']);
                // Cast counts to int so empty strings don't break integer columns
                foreach (['number_of_rooms', 'adults_count', 'children_count', 'elderly_count'] as $k) {
                    if (array_key_exists($k, $householdData)) {
                        $householdData[$k] = $householdData[$k] === '' || $householdData[$k] === null
                            ? null
                            : (int) $householdData[$k];
                    }
                }
                if ($user->householdInformation) $user->householdInformation()->update($householdData);
                else $user->householdInformation()->create($householdData);
                if ($isEdit != 1) $user->update(['step' => 4]);
            } catch (\Throwable $th) {
                \Log::error('updateProfile household info save failed: ' . $th->getMessage());
                // non-fatal
            }
        }

        if ($request->has('pet_details')) {
            try {
                $user->petDetails()->delete();
                foreach ($request->pet_details as $petDetail) {
                    if (!is_array($petDetail)) continue;
                    $type = trim((string)($petDetail['pet_type'] ?? ''));
                    $count = $petDetail['pet_count'] ?? '';
                    if ($type === '' || $count === '') continue;
                    $user->petDetails()->create([
                        'pet_type' => $type,
                        'pet_count' => (int) $count,
                    ]);
                }
                if ($isEdit != 1) $user->update(['step' => 4]);
            } catch (\Throwable $th) {
                \Log::error('updateProfile pet_details save failed: ' . $th->getMessage());
                // non-fatal
            }
        }
        if ($request->has('user_role_id')) {
            try {
                $user->update(['user_role_id' => $request->user_role_id]);
            } catch (\Throwable $th) {
                \Log::error('updateProfile user_role_id update failed: ' . $th->getMessage());
            }
        }

        if ($request->has('auto_attendence')) {
            try {
                $user->update(["auto_attendence" => $request->auto_attendence]);
            } catch (\Throwable $th) {
                \Log::error('updateProfile auto_attendence update failed: ' . $th->getMessage());
            }
        }

        $user->load(['addresses', 'petDetails', 'householdInformation','userWorkInfo']);
        return response()->json(['success' => true, 'message' => 'Profile updated successfully', 'data' => $user]);

    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Update Profile Fail: ' . $e->getMessage());
        try {
             file_put_contents(storage_path('logs/debug_error.log'), date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n\n", FILE_APPEND);
        } catch (\Exception $writeErr) {}

        return response()->json(['success' => false, 'message' => 'Failed to update profile', 'error' => $e->getMessage()], 500);
    }
}

private function saveWorkAndExperience($user, $request, $isEdit)
{
    // Work Info
    $workValidated = $request->validate([
        'primary_role' => 'nullable|string|max:255',
        'skills' => 'nullable|array',
        'skills.*' => 'string|max:255',
        'languages_spoken' => 'nullable|array',
        'total_experience' => 'nullable|string|max:255',
        'education' => 'nullable|string|max:255',
        'additional_info' => 'nullable',
        'voice_note' => 'nullable|file|max:10240',
    ]);



  $jsonResponse = json_encode($workValidated, JSON_PRETTY_PRINT);

    // File path inside storage folder
    $filePath = storage_path('logs/ddddv.txt');

    // Open the file for appending (creates file if not exists)
    $file = fopen($filePath, 'a');

    if ($file) {
        fwrite($file, "==== " . date('Y-m-d H:i:s') . " ====\n");
        fwrite($file, $jsonResponse . "\n\n");
        fclose($file);
    } else {
        // Handle error if file couldn't be opened
        \Log::error('Could not open log file for writing.');
    }
    $workInfo = UserWorkInfo::where('user_id', $user->id)->first();
    UserHouseholdInformation::updateOrCreate(
    ['user_id' => $user->id],     // condition
    ['languages_spoken' => $request->languages_spoken] // fields to update
);
    $data = [
        'primary_role' => $workValidated['primary_role'] ?? null,
        'skills' => $workValidated['skills'] ?? [],
         'languages_spoken' => $workValidated['languages_spoken'] ?? null,
        'total_experience' => $workValidated['total_experience'] ?? null,
        'education' => $workValidated['education'] ?? null,
        'additional_info' => $workValidated['additional_info'] ?? null,
    ];
    if ($request->hasFile('voice_note')) {
        $directory = "uploads/user_voice_notes";
        // if (!file_exists(public_path($directory))) mkdir(public_path($directory), 0755, true);
        // $file = $request->file('voice_note');
        // $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path($directory), $fileName);
        // $path = $directory . '/' . $fileName;
        // if ($workInfo && $workInfo->voice_note && file_exists(public_path($workInfo->voice_note))) unlink(public_path($workInfo->voice_note));
        $path = $this->uploadCloudary($request,"voice_note",$directory);
        $data['voice_note'] = $path;
    }
    UserWorkInfo::updateOrCreate(['user_id' => $user->id], $data);

    // Last Work Experience
    $expValidated = $request->validate([
        'id' => 'nullable',
        'role' => 'nullable',
        'join_date' => 'nullable',
        'end_date' => 'nullable',
        'salary' => 'nullable',
        'working_hours' => 'nullable',
        'house_sold' => 'nullable',
        'owner_name' => 'nullable',
        'contact_number' => 'nullable',
        'state' => 'nullable',
        'city' => 'nullable',
    ]);
    $expData = [
        'user_id' => $user->id,
        'role' => $expValidated['role'] ?? null,
        'join_date' => $expValidated['join_date'] ?? null,
        'end_date' => $expValidated['end_date'] ?? null,
        'salary' => $expValidated['salary'] ?? null,
        'working_hours' => $expValidated['working_hours'] ?? null,
        'house_sold' => $expValidated['house_sold'] ?? 0,
        'owner_name' => $expValidated['owner_name'] ?? null,
        'contact_number' => $expValidated['contact_number'] ?? null,
        'state' => $expValidated['state'] ?? null,
        'city' => $expValidated['city'] ?? null,
    ];
    LastWorkExperience::updateOrCreate(['id' => $expValidated['id'] ?? null, 'user_id' => $user->id], $expData);

    if ($isEdit != 1) {
        $user->update(['step' => 6]);
    }
}


    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            $category->is_deleted = 1;
            $category->save();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

public function categoryUpdate(Request $request, $id)
{
    try {
        // Find the category by ID
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255|unique:categories,name,' . $id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add other fields as needed
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $directory = "uploads/categories";
            
            // Create directory if it doesn't exist
            // if (!file_exists(public_path($directory))) {
            //     mkdir(public_path($directory), 0755, true);
            // }

            // $image = $request->file('image');
            // $extension = $image->getClientOriginalExtension();
            // $fileName = time() . '_' . uniqid() . '.' . $extension;
            // $image->move(public_path($directory), $fileName);

            // $path = $directory . '/' . $fileName;

            // // Delete old image if exists
            // if ($category->image && file_exists(public_path($category->image))) {
            //     unlink(public_path($category->image));
            // }
            $path = $this->uploadCloudary($request,"image",$directory);

            // Add the new image path to data
            $data['image'] = $path;
        }

        // Update category data
        $category->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update category',
            'error' => $e->getMessage()
        ], 500);
    }
}







// public function updateProfileCustomer(Request $request)
// {
//     try {
//         $user = Auth::guard('api')->user();
        
//         if (!$user) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'User not found'
//             ], 404);
//         }

//         $validator = Validator::make($request->all(), [
//             'name' => 'sometimes|string|max:255',
//             'email' => 'nullable|email|unique:users,email,' . $user->id,
//             'phone' => 'nullable|string|max:20',
//             'address' => 'nullable|string|max:500',
//             'city' => 'nullable|string|max:100',
//             'state' => 'nullable|string|max:100',
//             'country' => 'nullable|string|max:100',
//             'zip_code' => 'nullable|string|max:20',
//             'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File upload validation
//             'location' => 'nullable',
//              'lat' => 'nullable',
//         'long' => 'nullable',
//         'user_role_id' => 'nullable',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Validation failed',
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         $data = $validator->validated();

//         // Handle profile picture upload
//         if ($request->hasFile('profile_picture')) {
//             $directory = "uploads/user_profile_images";
            
//             // Create directory if it doesn't exist
//             if (!file_exists(public_path($directory))) {
//                 mkdir(public_path($directory), 0755, true);
//             }

//             $image = $request->file('profile_picture');
//             $extension = $image->getClientOriginalExtension();
//             $fileName = time() . '_' . uniqid() . '.' . $extension;
//             $image->move(public_path($directory), $fileName);

//             $path = $directory . '/' . $fileName;

//             // Delete old profile picture if exists
//             if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
//                 unlink(public_path($user->profile_picture));
//             }

//             // Add the new profile picture path to data
//             $data['image'] = $path;
           
//         }
//  $data['steps'] = 2;
//         // Update user data
//         $user->update($data);

//         return response()->json([
//             'success' => true,
//             'message' => 'Profile updated successfully',
//             'data' => $user
//         ], 200);

//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Failed to update profile',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }


public function updateProfileCustomer(Request $request)
{
    try {
        $user = Auth::guard('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $isEdit = $request->input('is_edit', 0);

        $validator = Validator::make($request->all(), [
            'name'            => 'sometimes|string|max:255',
            'first_name'      => 'nullable|string|max:255',
            'last_name'       => 'nullable|string|max:255',
            'email'           => 'nullable|email|unique:users,email,' . $user->id,
            'phone'           => 'nullable|string|max:20',
            'gender'          => 'nullable|string|in:male,female,other',
            'dob'             => 'nullable|string|max:20',
            'location'        => 'nullable',
            'lat'             => 'nullable',
            'long'            => 'nullable',
            'user_role_id'    => 'nullable',
            'auto_attendence' => 'nullable|in:0,1',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'languages_spoken'=> 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $data = array_filter($validator->validated(), fn($v) => !is_null($v));

        // ✅ Handle profile picture
        if ($request->hasFile('profile_picture')) {
            $directory = "uploads/user_profile_images";
            $path = $this->uploadCloudary($request,"profile_picture",$directory);
            $data['image'] = $path;
        }

        // ✅ Build safe user update data — only columns that exist in users table
        $userUpdateData = array_filter([
            'name'       => $request->name,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'gender'     => $request->gender,
            'dob'        => $request->dob,
            'location'   => $request->location,
            'lat'        => $request->lat,
            'long'       => $request->long,
        ], fn($v) => !is_null($v));

        // Handle auto_attendence separately so value 0 is NOT removed by array_filter
        if ($request->has('auto_attendence')) {
            $userUpdateData['auto_attendence'] = (int) $request->auto_attendence;
        }

        // Attach uploaded image path if present
        if (isset($data['image'])) {
            $userUpdateData['image'] = $data['image'];
        }

        // ✅ Update user profile
        if ($isEdit != 1) {
            $userUpdateData['step'] = 2;
        }
        $user->update($userUpdateData);

        // ✅ Merge Work Info logic
        $workValidated = $request->validate([
            'primary_role' => 'nullable|string|max:255',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
            'languages_spoken' => 'nullable|max:255',
            'total_experience' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'additional_info' => 'nullable',
            'voice_note' => 'nullable|file|max:10240',
        ]);
        $workInfo = UserWorkInfo::where('user_id', $user->id)->first();

        // Update household information
        $householdData = array_filter([
            'residence_type'     => $request->residence_type,
            'number_of_rooms'    => $request->number_of_rooms,
            'languages_spoken'   => $request->languages_spoken,
            'adults_count'       => $request->adults_count,
            'children_count'     => $request->children_count,
            'elderly_count'      => $request->elderly_count,
            'special_requirements' => $request->special_requirements,
        ], fn($v) => !is_null($v));
        if (!empty($householdData)) {
            UserHouseholdInformation::updateOrCreate(['user_id' => $user->id], $householdData);
        }

        // Update pet details
        if ($request->has('pet_details') && is_array($request->pet_details)) {
            \App\Models\UserPetDetail::where('user_id', $user->id)->delete();
            foreach ($request->pet_details as $pet) {
                if (!empty($pet['pet_type']) && !empty($pet['pet_count'])) {
                    \App\Models\UserPetDetail::create([
                        'user_id'   => $user->id,
                        'pet_type'  => $pet['pet_type'],
                        'pet_count' => $pet['pet_count'],
                    ]);
                }
            }
        }

        // Update addresses
        if ($request->has('addresses') && is_array($request->addresses)) {
            \App\Models\UserAddress::where('user_id', $user->id)->delete();
            foreach ($request->addresses as $addr) {
                if (!empty(array_filter($addr))) {
                    \App\Models\UserAddress::create([
                        'user_id' => $user->id,
                        'street'  => $addr['street'] ?? '',
                        'city'    => $addr['city'] ?? '',
                        'state'   => $addr['state'] ?? '',
                        'pincode' => $addr['pincode'] ?? '',
                    ]);
                }
            }
        }

        $workData = [
            'primary_role' => $workValidated['primary_role'] ?? null,
            'skills' => $workValidated['skills'] ?? [],
            'languages_spoken' => $workValidated['languages_spoken'] ?? null,
            'total_experience' => $workValidated['total_experience'] ?? null,
            'education' => $workValidated['education'] ?? null,
            'additional_info' => $workValidated['additional_info'] ?? null,
        ];

        $data = $validator->validated();
         $jsonResponse = json_encode($data, JSON_PRETTY_PRINT);

    // File path inside storage folder
    $filePath = storage_path('logs/sss.txt');

    // Open the file for appending (creates file if not exists)
    $file = fopen($filePath, 'a');

    if ($file) {
        fwrite($file, "==== " . date('Y-m-d H:i:s') . " ====\n");
        fwrite($file, $jsonResponse . "\n\n");
        fclose($file);
    } else {
        // Handle error if file couldn't be opened
        \Log::error('Could not open log file for writing.');
    }
        if ($request->hasFile('voice_note')) {
            $directory = "uploads/user_voice_notes";
            // if (!file_exists(public_path($directory))) mkdir(public_path($directory), 0755, true);
            // $file = $request->file('voice_note');
            // $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path($directory), $fileName);
            // $path = $directory . '/' . $fileName;
            // if ($workInfo && $workInfo->voice_note && file_exists(public_path($workInfo->voice_note))) unlink(public_path($workInfo->voice_note));
            $path = $this->uploadCloudary($request,"voice_note",$directory);
            $workData['voice_note'] = $path;
        }

        UserWorkInfo::updateOrCreate(['user_id' => $user->id], $workData);

        // ✅ Merge Last Work Experience
        $expValidated = $request->validate([
            'id' => 'nullable',
            'role' => 'nullable',
            'join_date' => 'nullable',
            'end_date' => 'nullable',
            'salary' => 'nullable',
            'working_hours' => 'nullable',
            'house_sold' => 'nullable',
            'owner_name' => 'nullable',
            'contact_number' => 'nullable',
            'state' => 'nullable',
            'city' => 'nullable',
        ]);

        $expData = [
            'user_id' => $user->id,
            'role' => $expValidated['role'] ?? null,
            'join_date' => $expValidated['join_date'] ?? null,
            'end_date' => $expValidated['end_date'] ?? null,
            'salary' => $expValidated['salary'] ?? null,
            'working_hours' => $expValidated['working_hours'] ?? null,
            'house_sold' => $expValidated['house_sold'] ?? 0,
            'owner_name' => $expValidated['owner_name'] ?? null,
            'contact_number' => $expValidated['contact_number'] ?? null,
            'state' => $expValidated['state'] ?? null,
            'city' => $expValidated['city'] ?? null,
        ];

        LastWorkExperience::updateOrCreate(['id' => $expValidated['id'] ?? null, 'user_id' => $user->id], $expData);

        if ($isEdit != 1) {
            $user->update(['step' => 6]);
        }

        return response()->json([
            'success' => true,
            'message' => $isEdit == 1 ? 'Profile edited successfully' : 'Profile updated successfully',
            'data' => $user->fresh()
        ]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to update profile', 'error' => $e->getMessage()], 500);
    }
}


public function categoryList(Request $request){
    try {
        $category = Category::where('is_deleted', 0)->get();
        return response()->json([
            'success' => true,
            'message' => 'Category Fetch successfully',
            'data' => $category
        ], 200);
    } catch (\Exception $e) {
        \Log::error('Category List Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch categories',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function getCmsData(Request $request)
{
    $query = DB::table('cms');

    // If slug is provided, apply filter
    if ($request->has('slug') && !empty($request->slug)) {
        $query->where('slug', $request->slug);
    }

    $cmsData = $query->get();

    if ($cmsData->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No CMS data found for the given slug',
            'data'    => []
        ], 404);
    }

    return response()->json([
        'success' => true,
        'message' => 'CMS data fetched successfully',
        'data'    => $cmsData
    ], 200);
}


public function getSubscriptionList(Request $request)
{
    $cmsObj = DB::table('subscriptions')->where('type','vendor')->get();
    return response()->json([
        'success' => true,
        'message' => 'Subscription data fetch successfully',
        'data' => $cmsObj
    ], 200);
}

public function completeBusinessProfile(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'photo_verification' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'business_proof' => 'required|file|max:2048',
            'adhaar_card_verification' => 'required|file|max:2048',
            'pan_card' => 'required|file|max:2048',
            'business_description' => 'required|string',
            'years_of_experience' => 'required|integer|min:0',
            'exact_location' => 'required|string',
            'business_website' => 'nullable|url',
            'gstin_number' => 'nullable|string',
                        'portfolio_images.*' => 'nullable|file|max:2048', // multiple files
                        'lat' => 'nullable',
                        'long' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        };
        if($request->user_id){
        $user = User::find($request->user_id);
        }
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $updateData = [
            'business_description' => $request->business_description,
            'years_of_experience' => $request->years_of_experience,
            'exact_location' => $request->exact_location,
            'business_website' => $request->business_website,
            'gstin_number' => $request->gstin_number,
            'step' => '2',
            'lat' => $request->lat,
            'long' => $request->long,
        ];

        // Handle photo verification upload
        if ($request->hasFile('photo_verification')) {
            $directory = 'uploads/users/verification';
            // $image = $request->file('photo_verification');
            
            
            // if (!file_exists(public_path($directory))) {
            //     mkdir(public_path($directory), 0755, true);
            // }
            
            // $fileName = 'photo_verification_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path($directory), $fileName);
            $path = $this->uploadCloudary($request,"photo_verification",$directory);
            $updateData['photo_verification'] = $path;
        }

        // Handle business proof upload
        if ($request->hasFile('business_proof')) {
            $directory = 'uploads/users/verification';
            // $image = $request->file('business_proof');
            
            
            // if (!file_exists(public_path($directory))) {
            //     mkdir(public_path($directory), 0755, true);
            // }
            
            // $fileName = 'business_proof_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path($directory), $fileName);
            $path = $this->uploadCloudary($request,"business_proof",$directory);
            $updateData['business_proof'] = $path;
        }

        // Handle adhaar card verification upload
        if ($request->hasFile('adhaar_card_verification')) {
            $directory = 'uploads/users/verification';
            
            // $image = $request->file('adhaar_card_verification');
            
            // if (!file_exists(public_path($directory))) {
            //     mkdir(public_path($directory), 0755, true);
            // }
            
            // $fileName = 'adhaar_verification_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path($directory), $fileName);
            $path = $this->uploadCloudary($request,"adhaar_card_verification",$directory);
            $updateData['adhaar_card_verification'] = $path;
        }

        // Handle PAN card upload
        if ($request->hasFile('pan_card')) {
            $directory = 'uploads/users/verification';
            
            // $image = $request->file('pan_card');
            
            // if (!file_exists(public_path($directory))) {
            //     mkdir(public_path($directory), 0755, true);
            // }
            
            // $fileName = 'pan_card_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path($directory), $fileName);
            $path = $this->uploadCloudary($request,"pan_card",$directory);
            $updateData['pan_card'] = $path;
        }

        $user->update($updateData);
   if ($request->hasFile('portfolio_images')) {
            $portfolioDir = 'uploads/users/portfolio';

            if (!file_exists(public_path($portfolioDir))) {
                mkdir(public_path($portfolioDir), 0755, true);
            }

            foreach ($request->file('portfolio_images') as $file) {
                // $fileName = 'portfolio_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // $file->move(public_path($portfolioDir), $fileName);
                $path = $this->uploadCloudary($request,"portfolio_images",$portfolioDir);
                PortfolioImage::create([
                    'user_id' => $user->id,
                    'image' => $path
                ]);
            }
        }

        // Fetch user with portfolio images
        $portfolioImages = PortfolioImage::where('user_id', $user->id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Business profile completed successfully',
            'data' => $user,
            'portfolio_images' => $portfolioImages, 
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

public function setBusinessAvailability(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'working_days' => 'required|array',
            'working_days.*' => 'string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'daily_start_time' => 'required|date_format:H:i',
            'daily_end_time' => 'required|date_format:H:i|after:daily_start_time',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $user = User::find($request->user_id);
        
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user->update([
            'working_days' => $request->working_days,
            'daily_start_time' => $request->daily_start_time,
            'daily_end_time' => $request->daily_end_time,
            'step' => '3'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Business availability set successfully',
            'data' => $user
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

public function notificationAdd(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'nullable|string'
        ]);

        // $userId = Auth::id(); // when authentication is used
        $notification = Notification::create([
            'user_id' => 1, // replace with $userId in real case
            'title' => $request->title,
            'message' => $request->message,
            'status' => $request->status ?? 'unread',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Notification added successfully',
            'data' => $notification
        ]);
    }

    public function notificationList(Request $request)
    {
        $userId = Auth::user()->id;
        $notifications = Notification::where('user_id', $userId) // replace with $userId
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Notifications retrieved successfully',
            'data' => $notifications
        ]);
    }

    public function notificationMarkAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update([
            'status' => 'read',
            'read_at' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Notification marked as read',
            'data' => $notification
        ]);
    }

    public function readAll(Request $request)
{
    $request->validate([
        'type' => 'required|in:is_single_read,is_all_read',
        'id'   => 'required_if:type,is_single_read|exists:notifications,id'
    ]);

    $userId = Auth::guard('api')->user()->id;

    if ($request->type === 'is_single_read') {
        // Mark a single notification as read
        $notification = Notification::where('id', $request->id)
            ->where('user_id', $userId)
            ->first();

        if ($notification) {
            $notification->update(['read_at' => now()]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Notification marked as read',
        ]);
    }

    if ($request->type === 'is_all_read') {
        // Mark all notifications for the user as read
        Notification::where('user_id', $userId)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json([
            'status'  => 'success',
            'message' => 'All notifications marked as read',
        ]);
    }
}

public function serviceCategoryList(Request $request){
    $list = Category::all();
     return response()->json([
            'status'  => 'success',
            'message' => 'All Category List Fatch',
            'data' => $list,
        ]);
}

public function orderList(Request $request){
        $userId = Auth::guard('api')->user()->id;
    $list = Order::with('user','service')->where('user_id',$userId)->get();
     return response()->json([
            'status'  => 'success',
            'message' => 'All Order List Fatch',
            'data' => $list,
        ]);
}

public function userList(Request $request)
{
    try {
        $users = User::where('user_role_id', 2)
            ->with(['portfolioImages']) // eager load portfolio images
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'User list fetched successfully',
            'data' => $users
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

public function vendorList(Request $request)
{
    
    try {
        $users = User::where('user_role_id', 1)
            ->with(['portfolioImages']) // eager load portfolio images
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'User list fetched successfully',
            'data' => $users
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

public function socialLoginCallback(Request $request)
	{
		$social_user = $request->data;
		$provider 	 = $request->provider;
		$language_id                       =   $this->current_language_id() ?? 1;
	    if (!empty($social_user['email'])) {
        $existingUser = User::where('email', $social_user['email'])
                          ->where('is_deleted', 0)
                          ->first();

        if ($existingUser) {
            $requestedRole = $social_user['role'] ?? 2;
            $existingRole = $existingUser->user_role_id;
            if ($existingRole != $requestedRole) {
                $roleName = $existingRole == 1 ? 'vendor' : 'customer';
                $response['status'] = 'error';
                $response["msg"] = "You already have a $roleName account with this email. Please delete it first to login as a " . ($requestedRole == 1 ? 'vendor' : 'user');
                $response['data'] = (object) [];
                return response()->json($response);
            }
        }
    }

		if($provider == 'apple'){
			$dataArr = [
				'name'        	=> $social_user['user'],
				'social_type' 	=> $provider,
				'social_id'   	=> $social_user['id'],
				'user_role_id'	=> 2,
				'is_active'   	=> 1,
				'language'   	=> $language_id,
				// 'is_approved' 	=> 1,
				'is_verified' 	=> 1,
                'url_image'     => $social_user['image'],
			];
			
			$user = User::firstOrCreate($dataArr);
		}else{
			if (!empty($social_user) && $social_user['email']) {
				$condition = ['email' => $social_user['email'], 'is_deleted' => 0];
			} else {
				$condition = ['social_type' => $provider, 'social_id' => $social_user['id'], 'is_deleted' => 0,'user_role_id'=>2];
			}
			$user = User::firstOrNew($condition);
			$user->name 			= $social_user['name'];
			$user->first_name 		= $social_user['first_name'] ?? '';
			$user->last_name 		= $social_user['last_name'] ?? '';
                           $user->url_image     = $social_user['image'];
			$user->language 		= $language_id;
			$user->social_type 	= $provider;
			$user->social_id 		= $social_user['id'];
			$user->user_role_id 	= 2;
			$user->is_active 		= 1;
			// $user->is_approved 	= 1;
			$user->is_verified 		= 1;
			$user->save();
		}
	
		if ($user) {
			if ($user->image) {
				$user->image = $user->image ?? '';
			}
			$user_data = $user->only(['id',
				'user_role_id',
				'name',
				'first_name',
				'last_name',
				'email',
				'url_image',
				'address',
				'gender',
				'dob',
                'step',
				'is_approved',
				'is_verified',
				'is_active',
				'government_id',
				'emergency_contact',
				'image'
			]);
			$response['token'] = $user->createToken('authToken')->accessToken;
			$response['status'] = 'success';
			$response["msg"]	= "Sign Up successfully";
			$response['data'] = $user_data;
		} else {
			$response['status'] = 'success';
			$response["msg"]	= "Something went worng";
			$response['data'] = (object) [];
		}
		return response()->json($response);
	}

 public function categoryDetails(Request $request, $id)
{
    $category = Category::find($id);

    if (!$category) {
        return response()->json([
            'status'  => false,
            'message' => 'Category not found.',
            'data'    => null
        ], 404);
    }

    // Fetch services and subservices for this category
    $services = Service::where('category_id', $id)->get();
    $subServices = SubService::where('category_id', $id)->get();

    $responseData = [
        'category'    => $category,
        'services'    => $services,
        'subServices' => $subServices,
    ];

    return response()->json([
        'status'  => true,
        'message' => 'Category details fetched successfully.',
        'data'    => $responseData
    ], 200);
}

public function vendorDetails(Request $request,$id){
    $user = User::with('subServices','services','category')->find($id);
    return response()->json([
        'status'  => true,
        'message' => 'Shop details fetched successfully.',
        'data'    => $user
    ], 200);
}

public function vendorListAuth(Request $request)
{
    $category = $request->service_category;
    $name = $request->name;
    $perPage = $request->per_page ?? 10; // Number of items per page, default 10

    try {
        $query = User::where('user_role_id', 1)
            ->when($category, function ($query, $category) {
                return $query->where('service_category', $category);
            })
            ->when($name, function ($query, $name) {
                return $query->where('name', 'like', "%{$name}%");
            })
            ->with(['portfolioImages', 'subServices', 'services', 'category']);
if ($request->has('lat') && $request->has('long')) {
    $latitude = $request->lat;
    $longitude = $request->long;
    $radius = 500; 

    $query->selectRaw("users.*, 
        (6371 * acos(cos(radians(?)) * cos(radians(lat)) 
        * cos(radians(`long`) - radians(?)) 
        + sin(radians(?)) * sin(radians(lat)))) AS distance", 
        [$latitude, $longitude, $latitude])
        ->having("distance", "<=", $radius)
        ->orderBy("distance", "asc");
}

        $users = $query->paginate($perPage);

        // Add wishlist_status to each vendor
        $users->getCollection()->transform(function ($user) {
            $wishlist = Wishlist::where('vendorId', $user->id)->exists();
            $user->wishlist_status = $wishlist ? 1 : 0;
            return $user;
        });

        return response()->json([
            'status'  => true,
            'message' => 'Shop list fetched successfully',
            'data'    => $users
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

public function appointmentList(Request $request)
{
    try {
        $userId = Auth::guard('api')->user()->id;
        $list = Booking::with(['customer', 'vendor', 'service'])
            ->where('vendor_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => $list->isEmpty() ? 'No appointments found' : 'Appointments fetched successfully',
            'data'    => $list
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => 'Something went wrong',
            'error'   => $e->getMessage()
        ], 500);
    }
}


// public function saveAadharAndSendOtp(Request $request)
// {
//     try {
//         $user = User::find($request->user_id) ?? Auth::guard('api')->user();
//         $request->validate([
//             'aadhar_number' => 'required|digits:12',
//         ]);
//         if($request->is_staff_add == 1){
//             $user->aadhar__verify_otp = '123456';
//             $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//             $user->save();

//             return response()->json([
//                 'status' => true,
//                 'message' => 'OTP resent successfully',
//             ], 200);
//         }else{
//             if (!empty($user->aadhar_number)) {
//                 if ($user->aadhar_number !== $request->aadhar_number) {
//                     return response()->json([
//                         'status' => false,
//                         'message' => 'Aadhaar number cannot be changed once saved.'
//                     ], 400);
//                 }
//                 $user->aadhar__verify_otp = '123456';
//                 $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//                 $user->save();
    
//                 return response()->json([
//                     'status' => true,
//                     'message' => 'OTP resent successfully',
//                 ], 200);
//             }
//         }
       
//         $exists = User::where('aadhar_number', $request->aadhar_number)
//             ->where('id', '!=', $user->id)
//             ->exists();

//         if ($exists) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Aadhaar number already registered with another user.'
//             ], 422);
//         }
//         $user->aadhar_number = $request->aadhar_number;
//         $user->aadhar__verify_otp = '123456';
//         $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//         $user->aadhar__verify = false;
//         $user->aadhar__verify_at = null;
//         $user->save();

//         return response()->json([
//             'status' => true,
//             'message' => 'Aadhaar number saved and OTP sent successfully',
//             'data' => [
//                 'aadhar_number' => $user->aadhar_number,
//             ]
//         ], 200);

//     } catch (\Illuminate\Validation\ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation failed',
//             'errors' => $e->errors()
//         ], 422);

//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Failed to save or send Aadhaar OTP',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }

// public function saveAadharAndSendOtp(Request $request)
// {
//     try {
//         $user = User::find($request->user_id) ?? Auth::guard('api')->user();

//         $request->validate([
//             'aadhar_number' => 'required|digits:12',
//         ]);

//         // =============================
//         // CASE 1: STAFF ADDING NEW STAFF
//         // =============================
//         if ($request->is_staff_add == 1) {

//             // Check if Aadhaar already belongs to someone → return details
//             $existingUser = User::where('aadhar_number', $request->aadhar_number)->first();
//             if ($user->aadhar_number == $request->aadhar_number) {
//                         return response()->json([
//                             'status' => false,
//         'message' => 'You cannot add this staff member because the Aadhaar number matches your own.'
//                         ], 400);
//                 }
//             if ($existingUser) {
//                 return response()->json([
//                     'status' => true,
//                     'message' => 'Aadhaar already registered. Existing user details fetched.',
//                     'data' => [
//                         'user_id' => $existingUser->id,
//                         'name'    => $existingUser->name,
//                         'phone'   => $existingUser->phone,
//                         'email'   => $existingUser->email,
//                         'address' => $existingUser->address,
//                         'city'    => $existingUser->city,
//                         'state'   => $existingUser->state,
//                         'country' => $existingUser->country,
//                     ]
//                 ], 200);
//             }

//             // Aadhaar NOT registered → send OTP, create record for staff
//             $user->aadhar_number = $request->aadhar_number;
//             $user->aadhar__verify_otp = '123456';
//             $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//             $user->aadhar__verify = false;
//             $user->save();

//             return response()->json([
//                 'status' => true,
//                 'message' => 'New staff Aadhaar saved & OTP sent',
//             ], 200);
//         }


//         // ==========================================
//         // CASE 2: NORMAL USER — Aadhaar cannot change
//         // ==========================================
//         if (!empty($user->aadhar_number)) {

//             // User already has Aadhaar saved, cannot change it
//             if ($user->aadhar_number !== $request->aadhar_number) {
//                 return response()->json([
//                     'status' => false,
//                     'message' => 'Aadhaar number cannot be changed once saved.'
//                 ], 400);
//             }

//             // Resend OTP only
//             $user->aadhar__verify_otp = '123456';
//             $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//             $user->save();

//             return response()->json([
//                 'status' => true,
//                 'message' => 'OTP resent successfully',
//             ], 200);
//         }


//         // ==========================================
//         // CHECK IF THIS AADHAAR BELONGS TO ANOTHER USER
//         // ==========================================
//         $existingUser = User::where('aadhar_number', $request->aadhar_number)
//             ->where('id', '!=', $user->id)
//             ->first();

//         if ($existingUser) {
//             return response()->json([
//                 'status' => true,
//                 'message' => 'Aadhaar already registered. Existing user details fetched.',
//                 'data' => [
//                     'user_id' => $existingUser->id,
//                     'name'    => $existingUser->name,
//                     'phone'   => $existingUser->phone,
//                     'email'   => $existingUser->email,
//                     'address' => $existingUser->address,
//                     'city'    => $existingUser->city,
//                     'state'   => $existingUser->state,
//                     'country' => $existingUser->country,
//                 ]
//             ], 200);
//         }


//         // ==========================================
//         // SAVE NEW AADHAAR FOR CURRENT USER
//         // ==========================================
//         $user->aadhar_number      = $request->aadhar_number;
//         $user->aadhar__verify_otp = '123456';
//         $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
//         $user->aadhar__verify     = false;
//         $user->aadhar__verify_at  = null;
//         $user->save();

//         return response()->json([
//             'status' => true,
//             'message' => 'Aadhaar number saved and OTP sent successfully',
//             'data' => [
//                 'aadhar_number' => $user->aadhar_number,
//             ]
//         ], 200);


//     } catch (\Illuminate\Validation\ValidationException $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Validation failed',
//             'errors' => $e->errors()
//         ], 422);

//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Failed to save or send Aadhaar OTP',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }



public function saveAadharAndSendOtp(Request $request)
{
    try {
        $authUser = Auth::guard('api')->user();
        $user = User::find($request->user_id) ?? $authUser;

        $request->validate([
            'aadhar_number' => 'required|digits:12',
        ]);

        // =============================
        // CASE 1: STAFF ADDING NEW STAFF
        // =============================
        if ($request->is_staff_add == 1) {

            // Check if Aadhaar already belongs to someone → return details
            $existingUser = User::where('aadhar_number', $request->aadhar_number)->first();
            
            if ($authUser->aadhar_number == $request->aadhar_number) {
                return response()->json([
                    'status' => false,
                    'message' => 'You cannot add this staff member because the Aadhaar number matches your own.'
                ], 400);
            }
            
            if ($existingUser) {
                  $existingUser->aadhar__verify_otp = '123456';
            $existingUser->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
$existingUser->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Aadhaar already registered. Existing user details fetched.',
                    'data' => User::with(['addresses','petDetails','lastExp','householdInformation','kycInformation','userWorkInfo','addedByUser', 'addedByUser.addresses',
    'addedByUser.petDetails',
    'addedByUser.lastExp',
    'addedByUser.householdInformation',
    'addedByUser.kycInformation',
    'addedByUser.userWorkInfo'])->find($existingUser->id),
                ], 200);
            }

            // ==========================================
            // Aadhaar NOT registered → CREATE NEW USER
            // ==========================================
            $newUser = new User();
            $newUser->name = 'Staff Member';
            $newUser->aadhar_number = $request->aadhar_number;
            $newUser->aadhar__verify_otp = '123456';
            $newUser->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
            $newUser->aadhar__verify = false;
            $newUser->is_staff_added = 1; // Mark as staff added
            // $newUser->added_by = $authUser->id; // Set who added this staff
              $newUser->step = 4;
            $newUser->user_role_id = 2;
            $newUser->save();

            return response()->json([
                'status' => true,
                'message' => 'New staff user created with Aadhaar & OTP sent',
                'data' => [
                    'user_id' => $newUser->id,
                    'aadhar_number' => $newUser->aadhar_number,
                ]
            ], 200);
        }
        
        

        // ==========================================
        // CASE 2: NORMAL USER — Aadhaar cannot change
        // ==========================================
        if (!empty($user->aadhar_number)) {

            // User already has Aadhaar saved, cannot change it
            if ($user->aadhar_number !== $request->aadhar_number) {
                return response()->json([
                    'status' => false,
                    'message' => 'Aadhaar number cannot be changed once saved.'
                ], 400);
            }

            // Resend OTP only
            $user->aadhar__verify_otp = '123456';
            $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'OTP resent successfully',
            ], 200);
        }


        // ==========================================
        // CHECK IF THIS AADHAAR BELONGS TO ANOTHER USER
        // ==========================================
        $existingUser = User::where('aadhar_number', $request->aadhar_number)
            ->where('id', '!=', $user->id)
            ->first();

        if ($existingUser) {
            return response()->json([
                'status' => true,
                'message' => 'Aadhaar already registered. Existing user details fetched.',
                'data' => User::with(['addresses','petDetails','lastExp','householdInformation','kycInformation','userWorkInfo','addedByUser', 'addedByUser.addresses',
    'addedByUser.petDetails',
    'addedByUser.lastExp',
    'addedByUser.householdInformation',
    'addedByUser.kycInformation',
    'addedByUser.userWorkInfo'])->find($existingUser->id),
            ], 200);
        }


        // ==========================================
        // SAVE NEW AADHAAR FOR CURRENT USER
        // ==========================================
        $user->aadhar_number      = $request->aadhar_number;
        $user->aadhar__verify_otp = '123456';
        $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
        $user->aadhar__verify     = false;
        $user->aadhar__verify_at  = null;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Aadhaar number saved and OTP sent successfully',
            'data' => [
                'aadhar_number' => $user->aadhar_number,
            ]
        ], 200);


    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {
        \Log::error('Aadhaar Save Error: ' . $e->getMessage());
        return response()->json([
            'status' => false,
            'message' => 'Failed to save or send Aadhaar OTP',
            'error' => $e->getMessage()
        ], 500);
    }
}





    /**
     * Verify Aadhar OTP
     */
    public function verifyAadharOtp(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            
            // Validate the request
            $request->validate([
                'otp' => 'required|digits:6'
            ]);
            
            // Check if Aadhar number exists
            if (!$user->aadhar_number) {
                return response()->json([
                    'status' => false,
                    'message' => 'Aadhar number not found. Please save Aadhar number first.'
                ], 400);
            }
            
            // Check if OTP matches
            if ($user->aadhar__verify_otp !== $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid OTP'
                ], 400);
            }
            
            // Check if OTP is expired
            if (Carbon::now()->gt($user->aadhar_number_otp_expire_at)) {
                return response()->json([
                    'status' => false,
                    'message' => 'OTP has expired'
                ], 400);
            }
            
            // Check if already verified
            if ($user->aadhar__verify) {
                return response()->json([
                    'status' => false,
                    'message' => 'Aadhar number is already verified'
                ], 400);
            }
            
            // Verify Aadhar
            $user->aadhar__verify = true;
            $user->aadhar__verify_at = Carbon::now();
            $user->aadhar__verify_otp = null; // Clear OTP after verification
            $user->aadhar_number_otp_expire_at = null; // Clear expiry time
            $user->save();
            
            return response()->json([
                'status' => true,
                'message' => 'Aadhar number verified successfully',
                'data' => [
                    'aadhar_number' => maskAadharNumber($user->aadhar_number),
                    'verified_at' => $user->aadhar__verify_at->format('Y-m-d H:i:s')
                ]
            ], 200);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to verify Aadhar OTP',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Resend Aadhar OTP
     */
    public function resendAadharOtp(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            
            // Check if Aadhar number exists
            if (!$user->aadhar_number) {
                return response()->json([
                    'status' => false,
                    'message' => 'Aadhar number not found. Please save Aadhar number first.'
                ], 400);
            }
            
            // Check if already verified
            if ($user->aadhar__verify) {
                return response()->json([
                    'status' => false,
                    'message' => 'Aadhar number is already verified'
                ], 400);
            }
            
            // Generate new OTP
            $user->aadhar__verify_otp = '123456'; // Fixed OTP for testing
            $user->aadhar_number_otp_expire_at = Carbon::now()->addMinutes(10);
            $user->save();
            
            // In production, send OTP via SMS/Email here
            
            return response()->json([
                'status' => true,
                'message' => 'OTP resent successfully',
                'data' => [
                    'aadhar_number' => $user->aadhar_number,
                    'otp' => '123456' // Only for testing, remove in production
                ]
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to resend OTP',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get Aadhar verification status
     */
    public function getAadharStatus(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            
            return response()->json([
                'status' => true,
                'message' => 'Aadhar status retrieved successfully',
                'data' => [
                    'aadhar_number' => $user->aadhar_number ?? Null,
                    'is_verified' => $user->aadhar__verify,
                    'verified_at' => $user->aadhar__verify_at ? $user->aadhar__verify_at->format('Y-m-d H:i:s') : null,
                    'has_pending_otp' => !empty($user->aadhar__verify_otp) && Carbon::now()->lt($user->aadhar_number_otp_expire_at)
                ]
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to get Aadhar status',
                'error' => $e->getMessage()
            ], 500);
        }
    }


   public function maskAadharNumber($aadharNumber)
{
    if (strlen($aadharNumber) === 12) {
        return substr($aadharNumber, 0, 4) . 'XXXX' . substr($aadharNumber, -4);
    }
    return $aadharNumber;
}

public function addressUpdate(Request $request)
{
    $user = Auth::guard('api')->user();
    $userData = User::find($user->id);

    $data = $request->all();

    // Transform grouped fields into array of addresses
    $addresses = [];
    $count = count($data['pincode'] ?? []);

    for ($i = 0; $i < $count; $i++) {
        $addresses[] = [
            'street' => $data['street'][$i] ?? null,
            'city' => $data['city'][$i] ?? null,
            'state' => $data['state'][$i] ?? null,
            'pincode' => $data['pincode'][$i] ?? null,
            'is_primary' => isset($data['is_primary'][$i]) ? (bool)$data['is_primary'][$i] : false,
            'id' => $data['id'][$i] ?? null,
        ];
    }

    $updatedAddresses = [];

    foreach ($addresses as $addr) {
        $validated = validator($addr, [
            'id' => 'nullable|integer|exists:user_addresses,id',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'is_primary' => 'sometimes|boolean'
        ])->validate();

        $id = $validated['id'] ?? null;

        if ($validated['is_primary'] ?? false) {
            UserAddress::where('user_id', $user->id)
                ->when($id, fn($q) => $q->where('id', '!=', $id))
                ->update(['is_primary' => false]);
        }

        $address = $id
            ? UserAddress::where('user_id', $user->id)->where('id', $id)->first()
            : null;

        if ($address) {
            $address->update($validated);
            $message = 'Address updated successfully';
        } else {
            $address = UserAddress::create(array_merge($validated, ['user_id' => $user->id]));
            $message = 'Address added successfully';
        }

        $updatedAddresses[] = [
            'message' => $message,
            'data' => $address
        ];
    }
        $userData->update(['step' => 4]);

    return response()->json([
        'success' => true,
        'message' => 'Addresses processed successfully',
        'addresses' => $updatedAddresses,
        'userData' => $userData,
    ]);
}

 public function addressIndex()
    {
        $user = Auth::guard('api')->user();
        
        $addresses = UserAddress::where('user_id', $user->id)
            ->orderBy('is_primary', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $addresses
        ]);
    }


    public function updateOrCreateWorkInfo(Request $request)
{
    $user = Auth::guard('api')->user();

    $validated = $request->validate([
        'primary_role' => 'nullable|string|max:255',
        'skills' => 'nullable|array',
        'skills.*' => 'string|max:255',
        'languages_spoken' => 'nullable|array',
        'total_experience' => 'nullable|string|max:255',
        'education' => 'nullable|string|max:255',
        'additional_info' => 'nullable',
        'voice_note' => 'nullable|file', // 10MB max
    ]);
 $workInfo = UserWorkInfo::where('user_id', $user->id)->first();
UserHouseholdInformation::updateOrCreate(
    ['user_id' => $user->id],     // condition
    ['languages_spoken' => $request->languages_spoken] // fields to update
);

    $data = [
        'primary_role' => $validated['primary_role'] ?? null,
        'skills' => $validated['skills'] ?? [],
        'languages_spoken' => $validated['languages_spoken'] ?? null,
        'total_experience' => $validated['total_experience'] ?? null,
        'education' => $validated['education'] ?? null,
        'additional_info' => $validated['additional_info'] ?? null,
    ];
    if ($request->hasFile('voice_note')) {
        $directory = "uploads/user_voice_notes";
        // if (!file_exists(public_path($directory))) {
        //     mkdir(public_path($directory), 0755, true);
        // }
        // $file = $request->file('voice_note');
        // $extension = $file->getClientOriginalExtension();
        // $fileName = time() . '_' . uniqid() . '.' . $extension;
        // $file->move(public_path($directory), $fileName);
        // $path = $directory . '/' . $fileName;
        // if ($workInfo && $workInfo->voice_note && file_exists(public_path($workInfo->voice_note))) {
        //     unlink(public_path($workInfo->voice_note));
        // }
        $path = $this->uploadCloudary($request,"voice_note",$directory);
        $data['voice_note'] = $path;
    }
    $workInfo = UserWorkInfo::updateOrCreate(
        ['user_id' => $user->id],
        $data
    );
    return response()->json([
        'success' => true,
        'message' => 'Work information saved successfully',
        'data' => $workInfo
    ]);
}
public function listSubcategories(Request $request)
    {
        $validated = $request->validate([
            'parent_id' => 'required|exists:categories,id',
        ]);

        $subcategories = Category::where('parent_id', $validated['parent_id'])
            ->with('children')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Subcategories fetched successfully',
            'data' => $subcategories
        ]);
    }

 public function storeOrUpdate(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'id' => 'nullable|exists:categories,id',
        'name' => 'required|string|max:255',
        'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $data = [
        'name' => $validated['name'],
    ];

    // If updating, get existing category
    $category = null;
    if (!empty($validated['id'])) {
        $category = Category::findOrFail($validated['id']);
    }

    // Upload new image
    if ($request->hasFile('image')) {

        $file = $request->file('image');

        // Folder structure (no filename here)
        $folderPath = 'uploads/category_images/';
        try {
            $imagepathfull = $this->uploadCloudary($request,"image",$folderPath);
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
        }
        $data['image'] = $imagepathfull;
    }

    // Create or Update
    if ($category) {
        $category->update($data);
    } else {
        $category = Category::create($data);
    }

    return response()->json([
        'success' => true,
        'message' => !empty($validated['id']) 
                ? 'Category updated successfully' 
                : 'Category created successfully',
        'data' => $category
    ]);
}


public function deleteSelfAccount(Request $request)
{
    try {
        $user = Auth::guard('api')->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // Mark as deleted (soft delete with is_deleted flag)
        $user->is_deleted = 1;
        $user->deleted_at = now();
        $user->save();

        // Revoke all tokens (logout from all devices)
        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Your account has been deleted successfully'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to delete account',
            'error' => $e->getMessage()
        ], 500);
    }
}

/**
 * Delete user account by admin
 */
public function deleteUserByAdmin(Request $request)
{
    try {
        // Check if the current user is admin (you might want to add admin role check)
        $adminUser = Auth::guard('api')->user();
        
        // Add admin role validation if you have roles implemented
        // if ($adminUser->user_role_id != 3) { // Assuming 3 is admin role
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Unauthorized. Admin access required.'
        //     ], 403);
        // }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $userToDelete = User::find($request->user_id);

        if (!$userToDelete) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        if ($userToDelete->is_deleted == 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'User account is already deleted'
            ], 400);
        }

        // Mark as deleted
        $userToDelete->is_deleted = 1;
        $userToDelete->deleted_at = now();
        $userToDelete->deleted_by = $adminUser->id; // Track who deleted the account
        $userToDelete->save();

        // Revoke all tokens
        $userToDelete->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User account deleted successfully',
            'deleted_user_id' => $userToDelete->id
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to delete user account',
            'error' => $e->getMessage()
        ], 500);
    }
}

/**
 * Get deleted users list (for admin)
 */
public function getDeletedUsers(Request $request)
{
    try {
        $adminUser = Auth::guard('api')->user();
        
        // Add admin role validation if needed
        // if ($adminUser->user_role_id != 3) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Unauthorized. Admin access required.'
        //     ], 403);
        // }

        $perPage = $request->per_page ?? 15;
        
        $deletedUsers = User::where('is_deleted', 1)
            ->with(['deletedBy']) // If you have a relationship for deleted_by
            ->orderBy('deleted_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'message' => 'Deleted users retrieved successfully',
            'data' => $deletedUsers
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to retrieve deleted users',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function storeNewMember(Request $request)
{
    try {
        $addedByUserId = Auth::guard('api')->user()->id;
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15|unique:users,phone_number',
        ]);
        // Optional: parse or validate mobile number
        $phoneData = [
            'number' => $request->mobile_number ?? null,
            'prefix' => '+91', // default, or extract dynamically
        ];

        $userData = [
            'name' => trim($request->full_name),
            'phone_number' => $phoneData['number'],
            'phone_number_prefix' => $phoneData['prefix'],
            'gender' => $request->gender !== 'Select Gender' ? $request->gender : null,
            'dob' => !empty($request->dob) ? $request->dob : null,
            'relation' => $request->relation !== 'Select Relation' ? $request->relation : null,
            'added_by' => $addedByUserId,
            'user_role_id' => 1, 
            'is_active' => true,
            'is_deleted' => false,
            'step' => 6,
        ];

        // Create the user
        $user = User::create($userData);

        return response()->json([
            'status' => true,
            'message' => 'Member added successfully.',
            'data' => $user
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to add member.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function updateMember(Request $request, $id)
{
    try {
        $addedByUserId = Auth::guard('api')->user()->id;
        $user = User::where('id', $id)
                    ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Member not found or you do not have permission to update this member.'
            ], 404);
        }
        $validated = $request->validate([
            'mobile_number' => [
                'sometimes',
                'required',
                'string',
                'max:15',
                Rule::unique('users', 'phone_number')->ignore($user->id),
            ],
            
        ]);
        $phoneData = [
            'number' => $request->mobile_number ?? $user->phone_number,
            'prefix' => '+91', 
        ];

        $userData = [
            'name' => trim($request->full_name) ?? $user->name,
            'phone_number' => $phoneData['number'],
            'phone_number_prefix' => $phoneData['prefix'],
            'gender' => $request->gender !== 'Select Gender' ? $request->gender : $user->gender,
            'dob' => !empty($request->dob) ? $request->dob : $user->dob,
            'relation' => $request->relation !== 'Select Relation' ? $request->relation : $user->relation,
        ];
        $userData = array_filter($userData, function($value) {
            return $value !== null;
        });
        $user->update($userData);

        return response()->json([
            'status' => true,
            'message' => 'Member updated successfully.',
            'data' => $user
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to update member.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function editMember($id)
{
    try {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Member not found or you do not have permission to edit this member.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Member data retrieved successfully.',
            'data' => $user
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to retrieve member data.',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function memberList(Request $request)
{
            $addedByUserId = Auth::guard('api')->user()->id;
    try {
        $members = User::where('added_by', $addedByUserId)
            ->where('is_deleted', false)
            ->where('user_role_id',1)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Member list fetched successfully.',
            'data' => $members
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to fetch member list.',
            'error' => $e->getMessage()
        ], 500);
    }
}



//  public function addStaff(Request $request)
//     {
//         DB::beginTransaction();
        
//         try {
//             // Validate the request
//             $validator = Validator::make($request->all(), [
//                 'first_name' => 'required|string|max:255',
//                 'last_name' => 'required|string|max:255',
//                 'email' => 'required|email|unique:users,email',
//                 'phone_number' => 'required|string|max:15|unique:users,phone_number',
//                 'phone_number_country_code' => 'required|string|max:5',
//                 'gender' => 'required|in:male,female,other',
//                 'dob' => 'required|date',
                
//                 // Address fields
//                 'street' => 'required|string|max:255',
//                 'city' => 'required|string|max:255',
//                 'state' => 'required|string|max:255',
//                 'pincode' => 'required|string|max:10',
                
//                 // Emergency contact
//                 'emergency_contact_name' => 'required|string|max:255',
//                 'emergency_contact_number' => 'required|string|max:15',
                
//                 // Work details
//                 'role_designation' => 'required|string|max:255',
//                 'joining_date' => 'required|date',
//                 'salary' => 'required|numeric',
//                 'pay_frequency' => 'required|in:weekly,monthly,bi-weekly',
//                 'working_days' => 'required|array',
//                 //|unique:users,aadhar_number
//                 // Aadhar details
//                 'aadhar_number' => 'required',
                
//                 // Document files (optional)
//                 'staff_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//                 'aadhar_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//                 'aadhar_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//                 'police_clearance_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
//             ]);

//             if ($validator->fails()) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'Validation error',
//                     'errors' => $validator->errors()
//                 ], 422);
//             }

//             // Handle file uploads
//             $staffPhotoPath = null;
//             $aadharFrontPath = null;
//             $aadharBackPath = null;
//             $policeClearancePath = null;

//             if ($request->hasFile('staff_photo')) {
//                 $staffPhotoPath = $request->file('staff_photo')->store('staff/photos', 'public');
//             }

//             if ($request->hasFile('aadhar_front')) {
//                 $aadharFrontPath = $request->file('aadhar_front')->store('staff/aadhar', 'public');
//             }

//             if ($request->hasFile('aadhar_back')) {
//                 $aadharBackPath = $request->file('aadhar_back')->store('staff/aadhar', 'public');
//             }

//             if ($request->hasFile('police_clearance_certificate')) {
//                 $policeClearancePath = $request->file('police_clearance_certificate')->store('staff/documents', 'public');
//             }

//             // Create staff user
//             $staff = User::create([
//                 'user_role_id' => 2, 
//                 'first_name' => $request->first_name,
//                 'last_name' => $request->last_name,
//                 'name' => $request->first_name . ' ' . $request->last_name,
//                 'email' => $request->email,
//                 'phone_number' => $request->phone_number,
//                 'phone_number_country_code' => $request->phone_number_country_code,
//                 'phone_number_prefix' => $request->phone_number_country_code,
//                 'password' => Hash::make('temp_password_123'), // Set temporary password
//                 'gender' => $request->gender,
//                 'dob' => $request->dob,
//                 'dob' => $request->dob,
                
//                 // Aadhar information
//                 'aadhar_number' => $request->aadhar_number,
                
//                 // Work information
                
//                 // Document paths
//                 'image' => $staffPhotoPath,
//                 'aadhar_front' => $aadharFrontPath,
//                 'aadhar_back' => $aadharBackPath,
//                 'verification_certificate' => $policeClearancePath,
                
//                 // Staff specific flags
//                 'is_staff_added' => 1,
//                 'added_by' => Auth::guard('api')->user()->id,
//                 'is_active' => 1,
//                 'is_verified' => 1,
                
//                 // Emergency contact
//                 'relation' => $request->emergency_contact_name,
//             ]);

//             // Create address record
//             if ($staff) {
//                 UserAddress::create([
//                     'user_id' => $staff->id,
//                     'street' => $request->street,
//                     'city' => $request->city,
//                     'state' => $request->state,
//                     'pincode' => $request->pincode,
//                     'is_primary' => true
//                 ]);
//             }

//             // Create work info record
//             if ($staff) {
//                 UserWorkInfo::create([
//                     'user_id' => $staff->id,
//                     'primary_role' => $request->role_designation,
//                     'joining_date' => $request->joining_date,
//                     'salary' => $request->salary,
//                     'pay_frequency' => $request->pay_frequency,
//                     'working_days' => $request->working_days,
//                     'emergency_contact_name' => $request->emergency_contact_name,
//                     'emergency_contact_number' => $request->emergency_contact_number,
//                 ]);
//             }

//             DB::commit();

//             return response()->json([
//                 'success' => true,
//                 'message' => 'Staff member added successfully',
//                 'data' => $staff->load(['addresses', 'userWorkInfo'])
//             ], 201);

//         } catch (\Exception $e) {
//             DB::rollBack();
            
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Failed to add staff member',
//                 'error' => $e->getMessage()
//             ], 500);
//         }
//     }


// public function addStaff(Request $request)
// {
//     DB::beginTransaction();
    
//     try {
//         // Validate the request
//         $validator = Validator::make($request->all(), [
//             'first_name' => 'required|string|max:255',
//             'last_name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email',
//             'phone_number' => 'required|string|max:15|unique:users,phone_number',
//             'phone_number_country_code' => 'required|string|max:5',
//             'gender' => 'required|in:male,female,other',
//             'dob' => 'required|date',
            
//             // Address fields
//             'street' => 'required|string|max:255',
//             'city' => 'required|string|max:255',
//             'state' => 'required|string|max:255',
//             'pincode' => 'required|string|max:10',
            
//             // Emergency contact
//             'emergency_contact_name' => 'required|string|max:255',
//             'emergency_contact_number' => 'required|string|max:15',
            
//             // Work details
//             'role_designation' => 'required|string|max:255',
//             'joining_date' => 'required|date',
//             'salary' => 'required|numeric',
//             'pay_frequency' => 'required|in:weekly,monthly,bi-weekly',
//             'working_days' => 'required|array',
            
//             // Aadhar details
//             'aadhar_number' => 'required',
            
//             // Document files (optional)
//             'staff_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'aadhar_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'aadhar_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'police_clearance_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Validation error',
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         // Check if Aadhar number already exists
//         $existingUser = User::where('aadhar_number', $request->aadhar_number)->first();

//         if ($existingUser) {
//             // Update existing user
//             return $this->updateExistingStaff($existingUser, $request);
//         }

//         // Handle file uploads
//         $staffPhotoPath = null;
//         $aadharFrontPath = null;
//         $aadharBackPath = null;
//         $policeClearancePath = null;

//         if ($request->hasFile('staff_photo')) {
//             $staffPhotoPath = $request->file('staff_photo')->store('staff/photos', 'public');
//         }

//         if ($request->hasFile('aadhar_front')) {
//             $aadharFrontPath = $request->file('aadhar_front')->store('staff/aadhar', 'public');
//         }

//         if ($request->hasFile('aadhar_back')) {
//             $aadharBackPath = $request->file('aadhar_back')->store('staff/aadhar', 'public');
//         }

//         if ($request->hasFile('police_clearance_certificate')) {
//             $policeClearancePath = $request->file('police_clearance_certificate')->store('staff/documents', 'public');
//         }

//         // Create staff user
//         $staff = User::create([
//             'user_role_id' => 2, 
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'name' => $request->first_name . ' ' . $request->last_name,
//             'email' => $request->email,
//             'phone_number' => $request->phone_number,
//             'phone_number_country_code' => $request->phone_number_country_code,
//             'phone_number_prefix' => $request->phone_number_country_code,
//             'password' => Hash::make('temp_password_123'), // Set temporary password
//             'gender' => $request->gender,
//             'dob' => $request->dob,
            
//             // Aadhar information
//             'aadhar_number' => $request->aadhar_number,
            
//             // Document paths
//             'image' => $staffPhotoPath,
//             'aadhar_front' => $aadharFrontPath,
//             'aadhar_back' => $aadharBackPath,
//             'verification_certificate' => $policeClearancePath,
            
//             // Staff specific flags
//             'is_staff_added' => 1,
//             'added_by' => Auth::guard('api')->user()->id,
//             'is_active' => 1,
//             'is_verified' => 1,
            
//             // Emergency contact
//             'relation' => $request->emergency_contact_name,
//         ]);

//         // Create address record
//         if ($staff) {
//             UserAddress::create([
//                 'user_id' => $staff->id,
//                 'street' => $request->street,
//                 'city' => $request->city,
//                 'state' => $request->state,
//                 'pincode' => $request->pincode,
//                 'is_primary' => true
//             ]);
//         }

//         // Create work info record
//         if ($staff) {
//             UserWorkInfo::create([
//                 'user_id' => $staff->id,
//                 'primary_role' => $request->role_designation,
//                 'joining_date' => $request->joining_date,
//                 'salary' => $request->salary,
//                 'pay_frequency' => $request->pay_frequency,
//                 'working_days' => $request->working_days,
//                 'emergency_contact_name' => $request->emergency_contact_name,
//                 'emergency_contact_number' => $request->emergency_contact_number,
//             ]);
//         }

//         DB::commit();

//         return response()->json([
//             'success' => true,
//             'message' => 'Staff member added successfully',
//             'data' => $staff->load(['addresses', 'userWorkInfo'])
//         ], 201);

//     } catch (\Exception $e) {
//         DB::rollBack();
        
//         return response()->json([
//             'success' => false,
//             'message' => 'Failed to add staff member',
//             'error' => $e->getMessage()
//         ], 500);
//     }
// }

public function addStaff(Request $request)
{
    DB::beginTransaction();
    
    // Get authenticated user for logging
    $authUser = Auth::guard('api')->user();
    $logAction = 'STAFF_ADD';
    
    try {
        // ── PRE-VALIDATION: check by Aadhar OR phone FIRST ──────────────────
        // If the person already exists in the system (same aadhar OR same phone),
        // we skip straight to the re-hire path so the phone unique rule never
        // blocks a legitimate re-hire.
        $existingByAadhar = User::where('aadhar_number', $request->aadhar_number)->first();
        $existingByPhone  = User::where('phone_number', $request->phone_number)->first();

        // If found by aadhar → re-hire regardless of phone
        if ($existingByAadhar) {
            $existingByAadhar->update(['user_role_id' => 2]);
            DB::commit();
            return $this->updateExistingStaff($existingByAadhar, $request);
        }

        // If found by phone only (no aadhar match) → could be a different person.
        // Still try to re-hire: treat as the same person being re-added.
        // If it turns out to be a conflict the employer will see the updated record.
        if ($existingByPhone) {
            $existingByPhone->update(['user_role_id' => 2]);
            DB::commit();
            return $this->updateExistingStaff($existingByPhone, $request);
        }
        // ────────────────────────────────────────────────────────────────────

        // New person — run full validation (phone unique is safe now because
        // we already handled the existing-user cases above).
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'required|string|max:15|unique:users,phone_number',
            'phone_number_country_code' => 'required|string|max:5',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            // Address fields
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            // Work details
            'role_designation' => 'array',
            'joining_date' => 'nullable|date',
            'salary' => 'nullable|numeric',
            'pay_frequency' => 'nullable|in:weekly,monthly,bi-weekly,daily',
            'working_days' => 'nullable|array',
            // Aadhar details
            'aadhar_number' => 'required',
            // Document files (optional)
            'staff_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aadhar_front' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'aadhar_back' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'police_clearance_certificate' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            \Log::warning('Staff addition validation failed', [
                'action' => $logAction,
                'requested_by' => $authUser ? $authUser->id : 'unknown',
                'validation_errors' => $validator->errors()->toArray(),
                'timestamp' => now()->toDateTimeString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        \Log::info('No existing staff found with Aadhar number, creating new staff record', [
            'action' => $logAction,
            'requested_by' => $authUser ? $authUser->id : 'unknown',
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'timestamp' => now()->toDateTimeString()
        ]);

        // Handle file uploads
        $staffPhotoPath = null;
        $aadharFrontPath = null;
        $aadharBackPath = null;
        $policeClearancePath = null;

        try {
            if ($request->hasFile('staff_photo')) {
                // $staffPhotoPath = $request->file('staff_photo')->store('staff/photos', 'public');
                $staffPhotoPath = $this->uploadCloudary($request,"staff_photo","staff/photos");
                \Log::info('Staff photo uploaded successfully', [
                    'action' => $logAction,
                    'file_path' => $staffPhotoPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Staff photo upload failed', [
                'action' => $logAction,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
        }

        try {
            if ($request->hasFile('aadhar_front')) {
                // $aadharFrontPath = $request->file('aadhar_front')->store('staff/aadhar', 'public');
                $aadharFrontPath = $this->uploadCloudary($request,"aadhar_front","staff/aadhar");
                
                \Log::info('Aadhar front photo uploaded successfully', [
                    'action' => $logAction,
                    'file_path' => $aadharFrontPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Aadhar front photo upload failed', [
                'action' => $logAction,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
        }

        try {
            if ($request->hasFile('aadhar_back')) {
                // $aadharBackPath = $request->file('aadhar_back')->store('staff/aadhar', 'public');
                $aadharBackPath = $this->uploadCloudary($request,"aadhar_back","staff/aadhar");
                \Log::info('Aadhar back photo uploaded successfully', [
                    'action' => $logAction,
                    'file_path' => $aadharBackPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Aadhar back photo upload failed', [
                'action' => $logAction,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
        }

        try {
            if ($request->hasFile('police_clearance_certificate')) {
                // $policeClearancePath = $request->file('police_clearance_certificate')->store('staff/documents', 'public');
                $aadharBackPath = $this->uploadCloudary($request,"police_clearance_certificate","staff/documents");
                
                \Log::info('Police clearance certificate uploaded successfully', [
                    'action' => $logAction,
                    'file_path' => $policeClearancePath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Police clearance certificate upload failed', [
                'action' => $logAction,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
        }

        // Create staff user
        try {
            \Log::info('Creating staff user record', [
                'action' => $logAction,
                'user_data' => [
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role_designation' => $request->role_designation,
                    'joining_date' => $request->joining_date ?? null,
                    'salary' => $request->salary ?? '',
                    'pay_frequency' => $request->pay_frequency ?? '',
                ],
                'timestamp' => now()->toDateTimeString()
            ]);

            $staff = User::create([
                'user_role_id' => 2, 
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'phone_number_country_code' => $request->phone_number_country_code,
                'phone_number_prefix' => $request->phone_number_country_code,
                'password' => Hash::make('temp_password_123'),
                'gender' => $request->gender,
                'dob' => $request->dob,
                'aadhar_number' => $request->aadhar_number,
                'image' => $staffPhotoPath,
                'aadhar_front' => $aadharFrontPath,
                'aadhar_back' => $aadharBackPath,
                'verification_certificate' => $policeClearancePath,
                'is_staff_added' => 1,
                'added_by' => $authUser->id,
                'is_active' => 1,
                'is_verified' => 1,
                'relation' => $request->emergency_contact_name,
                'upi_id' => $request->upi_id ?? null,
            ]);
            
            \Log::info('Staff user record created successfully', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'staff_name' => $staff->name,
                'created_at' => $staff->created_at,
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to create staff user record', [
                'action' => $logAction,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Create address record
        try {
            if ($staff) {
                \Log::info('Creating staff address record', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'address_data' => [
                        'city' => $request->city,
                        'state' => $request->state,
                        'pincode' => $request->pincode
                    ],
                    'timestamp' => now()->toDateTimeString()
                ]);

                $address = UserAddress::create([
                    'user_id' => $staff->id,
                    'street' => $request->street,
                    'city' => $request->city,
                    'state' => $request->state,
                    'pincode' => $request->pincode,
                    'is_primary' => true
                ]);

                \Log::info('Staff address record created successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'address_id' => $address->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to create staff address record', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Create work info record
        try {
            if ($staff) {
                \Log::info('Creating staff work info record', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'work_info' => [
                        'primary_role' => $request->role_designation,
                        'joining_date' => $request->joining_date ?? null,
                        'salary' => $request->salary ?? null,
                        'pay_frequency' => $request->pay_frequency ?? null,
                        'working_days_count' => count($request->working_days ?? [])
                    ],
                    'timestamp' => now()->toDateTimeString()
                ]);
                
                $workInfo = UserWorkInfo::create([
                    'user_id' => $staff->id,
                    'primary_role' => $request->role_designation,
                    'joining_date' => $request->joining_date ?? null,
                    'salary' => $request->salary ?? null,
                    'pay_frequency' => $request->pay_frequency ?? null,
                    'working_days' => $request->working_days ?? null,
                    'emergency_contact_name' => $request->emergency_contact_name,
                    'emergency_contact_number' => $request->emergency_contact_number,
                ]);

                \Log::info('Staff work info record created successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'work_info_id' => $workInfo->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to create staff work info record', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Create household information record (if languages_spoken is provided)
        try {
            if ($staff && $request->has('languages_spoken')) {
                \Log::info('Creating/updating staff household information record', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'languages_spoken' => $request->languages_spoken,
                    'timestamp' => now()->toDateTimeString()
                ]);

                // Make sure to import UserHouseholdInformation model at the top of your file
                // Add this to your imports: use App\Models\UserHouseholdInformation;
                UserHouseholdInformation::updateOrCreate(
                    ['user_id' => $staff->id],
                    ['languages_spoken' => $request->languages_spoken]
                );

                \Log::info('Staff household information record processed successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to process staff household information', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            // Don't throw for household info as it's optional
        }

        DB::commit();

        \Log::info('Staff addition completed successfully', [
            'action' => $logAction,
            'staff_id' => $staff->id,
            'staff_name' => $staff->name,
            'added_by' => $authUser->id,
            'added_by_name' => $authUser->name,
            'transaction_committed' => true,
            'timestamp' => now()->toDateTimeString()
        ]);

        

        return response()->json([
            'success' => true,
            'message' => 'Staff member added successfully',
            'data' => $staff->load(['addresses', 'userWorkInfo'])
        ], 201);

    } catch (\Exception $e) {
        DB::rollBack();

        \Log::error('Staff addition failed - Transaction rolled back', [
            'action' => $logAction,
            'error_message' => $e->getMessage(),
            'error_trace' => $e->getTraceAsString(),
            'requested_by' => $authUser ? $authUser->id : 'unknown',
            'transaction_rolled_back' => true,
            'timestamp' => now()->toDateTimeString()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Failed to add staff member',
            'error' => env('APP_DEBUG') ? $e->getMessage() : 'Internal server error'
        ], 500);
    }
}/**
 * Update existing staff member
 */
private function updateExistingStaff(User $existingUser, Request $request)
{
    // DB::beginTransaction();
    
    $authUser = Auth::guard('api')->user();
    $logAction = 'STAFF_UPDATE_EXISTING';
    
    // try {
        \Log::info('Starting update for existing staff', [
            'action' => $logAction,
            'existing_user_id' => $existingUser->id,
            'existing_email' => $existingUser->email,
            'existing_phone' => $existingUser->phone_number,
            'requested_by' => $authUser ? $authUser->id : 'unknown',
            'timestamp' => now()->toDateTimeString(),
            'update_data_summary' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role_designation' => $request->role_designation
            ]
        ]);

        // Handle file uploads
        $fileUpdateLog = [
            'staff_photo' => 'not_updated',
            'aadhar_front' => 'not_updated',
            'aadhar_back' => 'not_updated',
            'police_clearance_certificate' => 'not_updated'
        ];

        $staffPhotoPath = $existingUser->image;
        $aadharFrontPath = $existingUser->aadhar_front;
        $aadharBackPath = $existingUser->aadhar_back;
        $policeClearancePath = $existingUser->verification_certificate;

        try {
            if ($request->hasFile('staff_photo')) {
                \Log::info('Processing staff photo update', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'old_photo_exists' => !empty($existingUser->image),
                    'timestamp' => now()->toDateTimeString()
                ]);

                // Delete old photo if exists
                if ($existingUser->image && Storage::disk('public')->exists($existingUser->image)) {
                    Storage::disk('public')->delete($existingUser->image);
                    \Log::info('Old staff photo deleted', [
                        'action' => $logAction,
                        'user_id' => $existingUser->id,
                        'old_path' => $existingUser->image,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
                $staffPhotoPath = $this->uploadCloudary($request,"staff_photo","staff/photos");
                // $staffPhotoPath = $request->file('staff_photo')->store('staff/photos', 'public');
                $fileUpdateLog['staff_photo'] = 'updated';
                
                \Log::info('Staff photo updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'new_path' => $staffPhotoPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to update staff photo', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            $fileUpdateLog['staff_photo'] = 'failed';
        }

        try {
            if ($request->hasFile('aadhar_front')) {
                \Log::info('Processing Aadhar front update', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'old_file_exists' => !empty($existingUser->aadhar_front),
                    'timestamp' => now()->toDateTimeString()
                ]);

                if ($existingUser->aadhar_front && Storage::disk('public')->exists($existingUser->aadhar_front)) {
                    Storage::disk('public')->delete($existingUser->aadhar_front);
                    \Log::info('Old Aadhar front deleted', [
                        'action' => $logAction,
                        'user_id' => $existingUser->id,
                        'old_path' => $existingUser->aadhar_front,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
                $aadharFrontPath = $this->uploadCloudary($request,"aadhar_front","staff/aadhar");
                // $aadharFrontPath = $request->file('aadhar_front')->store('staff/aadhar', 'public');
                $fileUpdateLog['aadhar_front'] = 'updated';
                
                \Log::info('Aadhar front updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'new_path' => $aadharFrontPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to update Aadhar front', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            $fileUpdateLog['aadhar_front'] = 'failed';
        }

        try {
            if ($request->hasFile('aadhar_back')) {
                \Log::info('Processing Aadhar back update', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'old_file_exists' => !empty($existingUser->aadhar_back),
                    'timestamp' => now()->toDateTimeString()
                ]);

                if ($existingUser->aadhar_back && Storage::disk('public')->exists($existingUser->aadhar_back)) {
                    Storage::disk('public')->delete($existingUser->aadhar_back);
                    \Log::info('Old Aadhar back deleted', [
                        'action' => $logAction,
                        'user_id' => $existingUser->id,
                        'old_path' => $existingUser->aadhar_back,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
                $aadharBackPath = $this->uploadCloudary($request,"aadhar_back","staff/aadhar");
                
                // $aadharBackPath = $request->file('aadhar_back')->store('staff/aadhar', 'public');
                $fileUpdateLog['aadhar_back'] = 'updated';
                
                \Log::info('Aadhar back updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'new_path' => $aadharBackPath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to update Aadhar back', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            $fileUpdateLog['aadhar_back'] = 'failed';
        }

        try {
            if ($request->hasFile('police_clearance_certificate')) {
                \Log::info('Processing police clearance certificate update', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'old_file_exists' => !empty($existingUser->verification_certificate),
                    'timestamp' => now()->toDateTimeString()
                ]);

                if ($existingUser->verification_certificate && Storage::disk('public')->exists($existingUser->verification_certificate)) {
                    Storage::disk('public')->delete($existingUser->verification_certificate);
                    \Log::info('Old police clearance certificate deleted', [
                        'action' => $logAction,
                        'user_id' => $existingUser->id,
                        'old_path' => $existingUser->verification_certificate,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
                
                $policeClearancePath = $this->uploadCloudary($request,"police_clearance_certificate","staff/documents");
                
                // $policeClearancePath = $request->file('police_clearance_certificate')->store('staff/documents', 'public');
                $fileUpdateLog['police_clearance_certificate'] = 'updated';
                
                \Log::info('Police clearance certificate updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'new_path' => $policeClearancePath,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to update police clearance certificate', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            $fileUpdateLog['police_clearance_certificate'] = 'failed';
        }

        \Log::info('File update summary', [
            'action' => $logAction,
            'user_id' => $existingUser->id,
            'file_updates' => $fileUpdateLog,
            'timestamp' => now()->toDateTimeString()
        ]);

        // Update user details
        try {
            \Log::info('Updating user record', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'updates' => [
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email_old' => $existingUser->email,
                    'email_new' => $request->email,
                    'phone_old' => $existingUser->phone_number,
                    'phone_new' => $request->phone_number,
                    'role_designation' => $request->role_designation
                ],
                'timestamp' => now()->toDateTimeString()
            ]);
            // Prepare update data - match database column names exactly
    $updateData = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'name' => $request->first_name . ' ' . $request->last_name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'phone_number_country_code' => $request->phone_number_country_code,
        'phone_number_prefix' => $request->phone_number_country_code,
        'gender' => $request->gender,
        'dob' => $request->dob,
        'image' => $staffPhotoPath,
        'aadhar_front' => $aadharFrontPath,
        'aadhar_back' => $aadharBackPath,
        'verification_certificate' => $policeClearancePath,
        'is_staff_added' => 1,
        'added_by' => $authUser->id,
        'is_active' => 1,
        'is_verified' => 1,
        'step' => 6, // ← FIXED: Use 'step' not 'steps'
        'relation' => $request->emergency_contact_name,
    ];
    
    \Log::info('Update Data Prepared', ['data' => $updateData]);
    
    // Use save() method instead of update() to bypass fillable restrictions
    foreach ($updateData as $key => $value) {
        if ($value !== null) {
            $existingUser->{$key} = $value;
        }
    }
    
    // Save the changes
    $saveResult = $existingUser->save();
    
    // Refresh and log after update
    $existingUser->refresh();
// dd($existingUser);
            \Log::info('User record updated successfully', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'updated_at' => $existingUser->updated_at,
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to update user record', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update or create address record
        try {
            \Log::info('Processing address record update/creation', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'address_data' => [
                    'city' => $request->city,
                    'state' => $request->state,
                    'pincode' => $request->pincode
                ],
                'timestamp' => now()->toDateTimeString()
            ]);

            $existingAddress = UserAddress::where('user_id', $existingUser->id)->first();
            
            if ($existingAddress) {
                \Log::info('Existing address found, updating', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'address_id' => $existingAddress->id,
                    'timestamp' => now()->toDateTimeString()
                ]);

                $existingAddress->update([
                    'street' => $request->street,
                    'city' => $request->city,
                    'state' => $request->state,
                    'pincode' => $request->pincode,
                    'is_primary' => true
                ]);

                \Log::info('Address updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'address_id' => $existingAddress->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            } else {
                \Log::info('No existing address found, creating new', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'timestamp' => now()->toDateTimeString()
                ]);

                $newAddress = UserAddress::create([
                    'user_id' => $existingUser->id,
                    'street' => $request->street,
                    'city' => $request->city,
                    'state' => $request->state,
                    'pincode' => $request->pincode,
                    'is_primary' => true
                ]);

                \Log::info('New address created successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'address_id' => $newAddress->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to process address record', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update or create work info record
        try {
            \Log::info('Processing work info record update/creation', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'work_info' => [
                    'primary_role' => $request->role_designation,
                    'joining_date' => $request->joining_date,
                    'salary' => $request->salary,
                    'pay_frequency' => $request->pay_frequency,
                    'working_days_count' => count($request->working_days)
                ],
                'timestamp' => now()->toDateTimeString()
            ]);

            $existingWorkInfo = UserWorkInfo::where('user_id', $existingUser->id)->first();
            
            if ($existingWorkInfo) {
                \Log::info('Existing work info found, updating', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'work_info_id' => $existingWorkInfo->id,
                    'timestamp' => now()->toDateTimeString()
                ]);

                $existingWorkInfo->update([
                    'primary_role' => $request->role_designation,
                    'joining_date' => $request->joining_date,
                    'salary' => $request->salary,
                    'pay_frequency' => $request->pay_frequency,
                    'working_days' => $request->working_days,
                    'emergency_contact_name' => $request->emergency_contact_name,
                    'emergency_contact_number' => $request->emergency_contact_number,
                ]);

                \Log::info('Work info updated successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'work_info_id' => $existingWorkInfo->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            } else {
                \Log::info('No existing work info found, creating new', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'timestamp' => now()->toDateTimeString()
                ]);

                $newWorkInfo = UserWorkInfo::create([
                    'user_id' => $existingUser->id,
                    'primary_role' => $request->role_designation,
                    'joining_date' => $request->joining_date,
                    'salary' => $request->salary,
                    'pay_frequency' => $request->pay_frequency,
                    'working_days' => $request->working_days,
                    'emergency_contact_name' => $request->emergency_contact_name,
                    'emergency_contact_number' => $request->emergency_contact_number,
                ]);

                \Log::info('New work info created successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'work_info_id' => $newWorkInfo->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to process work info record', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update or create household information record
        try {
            if ($request->has('languages_spoken')) {
                \Log::info('Processing household information update/creation', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'languages_spoken' => $request->languages_spoken,
                    'timestamp' => now()->toDateTimeString()
                ]);

                UserHouseholdInformation::updateOrCreate(
                    ['user_id' => $existingUser->id],
                    ['languages_spoken' => $request->languages_spoken]
                );

                \Log::info('Household information processed successfully', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            } else {
                \Log::info('No languages_spoken provided, skipping household information update', [
                    'action' => $logAction,
                    'user_id' => $existingUser->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Failed to process household information', [
                'action' => $logAction,
                'user_id' => $existingUser->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            // Don't throw for household info as it's optional
        }

        DB::commit();

        \Log::info('Existing staff update completed successfully', [
            'action' => $logAction,
            'user_id' => $existingUser->id,
            'updated_by' => $authUser->id,
            'updated_by_name' => $authUser->name,
            'transaction_committed' => true,
            'timestamp' => now()->toDateTimeString(),
            'final_user_status' => [
                'is_staff_added' => $existingUser->is_staff_added,
                'is_active' => $existingUser->is_active,
                'is_verified' => $existingUser->is_verified,
                'step' => $existingUser->step
            ]
        ]);
// dd($existingUser);
        return response()->json([
            'success' => true,
            'message' => 'Staff member updated successfully',
            'data' => $existingUser->load(['addresses', 'userWorkInfo'])
        ], 200);

    // } catch (\Exception $e) {
    //     DB::rollBack();
        
    //     \Log::error('Existing staff update failed - Transaction rolled back', [
    //         'action' => $logAction,
    //         'user_id' => $existingUser->id,
    //         'error_message' => $e->getMessage(),
    //         'error_trace' => $e->getTraceAsString(),
    //         'requested_by' => $authUser ? $authUser->id : 'unknown',
    //         'transaction_rolled_back' => true,
    //         'timestamp' => now()->toDateTimeString()
    //     ]);

    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Failed to update staff member',
    //         'error' => env('APP_DEBUG') ? $e->getMessage() : 'Internal server error'
    //     ], 500);
    // }
}
    /**
     * Get list of all staff members
     */
    public function getStaffList(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 10);
            $search = $request->get('search', '');
            
            $staffQuery = User::where('is_staff_added', 1)
                ->where('added_by', Auth::guard('api')->user()->id)
                ->where('user_role_id',2)
                ->with(['addresses', 'userWorkInfo', 'addedByUser'])
                ->orderBy('created_at', 'desc');

            // Search functionality
            if (!empty($search)) {
                $staffQuery->where(function($query) use ($search) {
                    $query->where('first_name', 'like', "%{$search}%")
                          ->orWhere('last_name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%")
                          ->orWhere('phone_number', 'like', "%{$search}%")
                          ->orWhere('aadhar_number', 'like', "%{$search}%");
                });
            }

            $staff = $staffQuery->paginate($perPage);

            return response()->json([
                'success' => true,
                'message' => 'Staff list retrieved successfully',
                'data' => $staff
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve staff list',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get staff member details by ID
     */
    public function getStaffDetails($id)
    {
        try {
            $staff = User::where('is_staff_added', 1)
                ->where('added_by', Auth::guard('api')->user()->id)
                ->where('id', $id)
                ->with(['addresses', 'userWorkInfo', 'addedByUser'])
                ->first();

            if (!$staff) {
                return response()->json([
                    'success' => false,
                    'message' => 'Staff member not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Staff details retrieved successfully',
                'data' => $staff
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve staff details',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update staff member
     */
   public function updateStaff(Request $request, $id)
{
    DB::beginTransaction();
    
    $authUser = Auth::guard('api')->user();
    $logAction = 'STAFF_UPDATE_BY_ID';
    
    try {
        \Log::info('Starting staff update by ID', [
            'action' => $logAction,
            'staff_id' => $id,
            'requested_by' => $authUser ? $authUser->id : 'unknown',
            'requested_by_name' => $authUser ? $authUser->name : 'unknown',
            'timestamp' => now()->toDateTimeString(),
            'request_data_summary' => $request->except(['staff_photo']) // Exclude file data
        ]);

        // Find staff member
        try {
            \Log::info('Looking for staff member', [
                'action' => $logAction,
                'staff_id' => $id,
                'criteria' => [
                    'is_staff_added' => 1,
                    'added_by' => $authUser->id
                ],
                'timestamp' => now()->toDateTimeString()
            ]);

            $staff = User::where('is_staff_added', 1)
                ->where('added_by', $authUser->id)
                ->where('id', $id)
                ->first();

            if (!$staff) {
                \Log::warning('Staff member not found or unauthorized', [
                    'action' => $logAction,
                    'staff_id' => $id,
                    'searched_by_user' => $authUser->id,
                    'timestamp' => now()->toDateTimeString(),
                    'note' => 'Staff not found or user does not have permission to update this staff'
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Staff member not found'
                ], 404);
            }

            \Log::info('Staff member found', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'staff_name' => $staff->name,
                'staff_email' => $staff->email,
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Error finding staff member', [
                'action' => $logAction,
                'staff_id' => $id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Validate request
        try {
            \Log::info('Starting validation for staff update', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'validation_rules_count' => 16, // Count of validation rules
                'timestamp' => now()->toDateTimeString()
            ]);

            $validator = Validator::make($request->all(), [
                'first_name' => 'sometimes|required|string|max:255',
                'last_name' => 'sometimes|required|string|max:255',
                'email' => 'nullable|required|email|unique:users,email,' . $id,
                'phone_number' => 'sometimes|required|string|max:15|unique:users,phone_number,' . $id,
                'gender' => 'sometimes|required|in:male,female,other',
                'dob' => 'sometimes|required|date',
                
                // Address fields
                'street' => 'sometimes|required|string|max:255',
                'city' => 'sometimes|required|string|max:255',
                'state' => 'sometimes|required|string|max:255',
                'pincode' => 'sometimes|required|string|max:10',
                
                // Work details
                'role_designation' => 'sometimes|required|string|max:255',
                'joining_date' => 'sometimes|required|date',
                'salary' => 'sometimes|required|numeric',
                'pay_frequency' => 'sometimes|required|in:weekly,monthly,bi-weekly',
                
                // Emergency contact
                'emergency_contact_name' => 'sometimes|required|string|max:255',
                'emergency_contact_number' => 'sometimes|required|string|max:15',
                
                'aadhar_number' => 'sometimes|required|string|max:12|unique:users,aadhar_number,' . $id,
                'staff_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                \Log::warning('Staff update validation failed', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'validation_errors' => $validator->errors()->toArray(),
                    'timestamp' => now()->toDateTimeString()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            \Log::info('Staff update validation passed', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Error during validation', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Prepare update data
        $updateData = [];
        $updatedFields = [];
        $userFields = [
            'first_name', 'last_name', 'email', 'phone_number', 'gender',
            'dob', 'aadhar_number'
        ];

        try {
            \Log::info('Preparing user data for update', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'available_fields' => $userFields,
                'timestamp' => now()->toDateTimeString()
            ]);

            foreach ($userFields as $field) {
                if ($request->has($field)) {
                    if ($field === 'first_name' || $field === 'last_name') {
                        $updateData[$field] = $request->$field;
                        $updateData['name'] = $request->first_name . ' ' . $request->last_name;
                        $updatedFields[] = $field;
                        $updatedFields[] = 'name';
                    } else {
                        $updateData[$field] = $request->$field;
                        $updatedFields[] = $field;
                    }
                }
            }

            // Handle file uploads
            if ($request->hasFile('staff_photo')) {
                \Log::info('Processing staff photo upload', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'old_photo_exists' => !empty($staff->image),
                    'timestamp' => now()->toDateTimeString()
                ]);
                
                $updateData['image'] = $this->uploadCloudary($request,"staff_photo","staff/photos");
                
                // $updateData['image'] = $request->file('staff_photo')->store('staff/photos', 'public');
                $updatedFields[] = 'image';
                
                \Log::info('Staff photo uploaded successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'new_path' => $updateData['image'],
                    'timestamp' => now()->toDateTimeString()
                ]);
            }

            \Log::info('User update data prepared', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'fields_to_update' => $updatedFields,
                'update_count' => count($updatedFields),
                'timestamp' => now()->toDateTimeString()
            ]);
        } catch (\Exception $e) {
            \Log::error('Error preparing update data', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update staff user
        try {
            if (!empty($updateData)) {
                \Log::info('Updating staff user record', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'update_data' => $updateData,
                    'timestamp' => now()->toDateTimeString()
                ]);

                $staff->update($updateData);

                \Log::info('Staff user record updated successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'updated_fields' => $updatedFields,
                    'timestamp' => now()->toDateTimeString()
                ]);
            } else {
                \Log::info('No user data to update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error updating staff user record', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update address
        try {
            if ($request->hasAny(['street', 'city', 'state', 'pincode'])) {
                \Log::info('Processing address update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'address_fields_provided' => [
                        'street' => $request->has('street'),
                        'city' => $request->has('city'),
                        'state' => $request->has('state'),
                        'pincode' => $request->has('pincode')
                    ],
                    'timestamp' => now()->toDateTimeString()
                ]);

                $primaryAddress = $staff->addresses()->where('is_primary', true)->first();
                
                if ($primaryAddress) {
                    \Log::info('Existing primary address found, updating', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'address_id' => $primaryAddress->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);

                    $addressUpdateData = [
                        'street' => $request->street ?? $primaryAddress->street,
                        'city' => $request->city ?? $primaryAddress->city,
                        'state' => $request->state ?? $primaryAddress->state,
                        'pincode' => $request->pincode ?? $primaryAddress->pincode,
                    ];

                    $primaryAddress->update($addressUpdateData);

                    \Log::info('Address updated successfully', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'address_id' => $primaryAddress->id,
                        'updated_fields' => array_keys($addressUpdateData),
                        'timestamp' => now()->toDateTimeString()
                    ]);
                } else {
                    \Log::info('No primary address found, creating new', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);

                    $newAddress = UserAddress::create([
                        'user_id' => $staff->id,
                        'street' => $request->street,
                        'city' => $request->city,
                        'state' => $request->state,
                        'pincode' => $request->pincode,
                        'is_primary' => true
                    ]);

                    \Log::info('New address created successfully', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'address_id' => $newAddress->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
            } else {
                \Log::info('No address data provided, skipping address update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error updating address', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update work info
        try {
            if ($request->hasAny(['role_designation', 'joining_date', 'salary', 'pay_frequency', 'working_days', 'emergency_contact_name', 'emergency_contact_number'])) {
                \Log::info('Processing work info update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'work_info_fields_provided' => [
                        'role_designation' => $request->has('role_designation'),
                        'joining_date' => $request->has('joining_date'),
                        'salary' => $request->has('salary'),
                        'pay_frequency' => $request->has('pay_frequency'),
                        'working_days' => $request->has('working_days'),
                        'emergency_contact_name' => $request->has('emergency_contact_name'),
                        'emergency_contact_number' => $request->has('emergency_contact_number')
                    ],
                    'timestamp' => now()->toDateTimeString()
                ]);

                $workInfo = $staff->userWorkInfo;
                
                if ($workInfo) {
                    \Log::info('Existing work info found, updating', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'work_info_id' => $workInfo->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);

                    $workInfoUpdateData = [
                        'primary_role' => $request->role_designation ?? $workInfo->primary_role,
                        'joining_date' => $request->joining_date ?? $workInfo->joining_date,
                        'salary' => $request->salary ?? $workInfo->salary,
                        'pay_frequency' => $request->pay_frequency ?? $workInfo->pay_frequency,
                        'working_days' => $request->working_days ?? $workInfo->working_days,
                        'emergency_contact_name' => $request->emergency_contact_name ?? $workInfo->emergency_contact_name,
                        'emergency_contact_number' => $request->emergency_contact_number ?? $workInfo->emergency_contact_number,
                    ];

                    $workInfo->update($workInfoUpdateData);

                    \Log::info('Work info updated successfully', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'work_info_id' => $workInfo->id,
                        'updated_fields' => array_keys($workInfoUpdateData),
                        'timestamp' => now()->toDateTimeString()
                    ]);
                } else {
                    \Log::info('No work info found, creating new', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);

                    // Create work info if doesn't exist
                    $newWorkInfo = UserWorkInfo::create([
                        'user_id' => $staff->id,
                        'primary_role' => $request->role_designation,
                        'joining_date' => $request->joining_date,
                        'salary' => $request->salary,
                        'pay_frequency' => $request->pay_frequency,
                        'working_days' => $request->working_days,
                        'emergency_contact_name' => $request->emergency_contact_name,
                        'emergency_contact_number' => $request->emergency_contact_number,
                    ]);

                    \Log::info('New work info created successfully', [
                        'action' => $logAction,
                        'staff_id' => $staff->id,
                        'work_info_id' => $newWorkInfo->id,
                        'timestamp' => now()->toDateTimeString()
                    ]);
                }
            } else {
                \Log::info('No work info data provided, skipping work info update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error updating work info', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            throw $e;
        }

        // Update household information
        try {
            if ($request->has('languages_spoken')) {
                \Log::info('Processing household information update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'has_languages_spoken' => true,
                    'timestamp' => now()->toDateTimeString()
                ]);

                UserHouseholdInformation::updateOrCreate(
                    ['user_id' => $staff->id],
                    ['languages_spoken' => $request->languages_spoken]
                );

                \Log::info('Household information updated successfully', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            } else {
                \Log::info('No languages_spoken provided, skipping household information update', [
                    'action' => $logAction,
                    'staff_id' => $staff->id,
                    'timestamp' => now()->toDateTimeString()
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Error updating household information', [
                'action' => $logAction,
                'staff_id' => $staff->id,
                'error' => $e->getMessage(),
                'timestamp' => now()->toDateTimeString()
            ]);
            // Don't throw as household info is optional
        }

        DB::commit();

        \Log::info('Staff update by ID completed successfully', [
            'action' => $logAction,
            'staff_id' => $staff->id,
            'staff_name' => $staff->name,
            'updated_by' => $authUser->id,
            'updated_by_name' => $authUser->name,
            'transaction_committed' => true,
            'timestamp' => now()->toDateTimeString(),
            'summary' => [
                'user_fields_updated' => $updatedFields,
                'address_updated' => $request->hasAny(['street', 'city', 'state', 'pincode']),
                'work_info_updated' => $request->hasAny(['role_designation', 'joining_date', 'salary', 'pay_frequency', 'working_days', 'emergency_contact_name', 'emergency_contact_number']),
                'household_info_updated' => $request->has('languages_spoken')
            ]
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Staff member updated successfully',
            'data' => $staff->fresh(['addresses', 'userWorkInfo'])
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        
        \Log::error('Staff update by ID failed - Transaction rolled back', [
            'action' => $logAction,
            'staff_id' => $id,
            'error_message' => $e->getMessage(),
            'error_trace' => $e->getTraceAsString(),
            'requested_by' => $authUser ? $authUser->id : 'unknown',
            'transaction_rolled_back' => true,
            'timestamp' => now()->toDateTimeString()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Failed to update staff member',
            'error' => env('APP_DEBUG') ? $e->getMessage() : 'Internal server error'
        ], 500);
    }
}





    /**
     * Delete staff member (soft delete)
     */
    public function deleteStaff($id)
    {
        DB::beginTransaction();
        
        try {
            $staff = User::where('is_staff_added', 1)
                ->where('added_by', Auth::guard('api')->user()->id)
                ->where('id', $id)
                ->first();

            if (!$staff) {
                return response()->json([
                    'success' => false,
                    'message' => 'Staff member not found'
                ], 404);
            }

            // Soft delete the staff
            $staff->update([
                'is_active' => 0,
                'is_deleted' => 1,
                'deleted_at' => now(),
                'deleted_by' => Auth::guard('api')->user()->id
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Staff member deleted successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete staff member',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Activate/Deactivate staff member
     */
    public function toggleStaffStatus($id)
    {
        try {
            $staff = User::where('is_staff_added', 1)
                ->where('added_by', Auth::guard('api')->user()->id)
                ->where('id', $id)
                ->first();

            if (!$staff) {
                return response()->json([
                    'success' => false,
                    'message' => 'Staff member not found'
                ], 404);
            }

            $newStatus = !$staff->is_active;
            $staff->update(['is_active' => $newStatus]);

            return response()->json([
                'success' => true,
                'message' => $newStatus ? 'Staff member activated successfully' : 'Staff member deactivated successfully',
                'data' => [
                    'is_active' => $newStatus
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update staff status',
                'error' => $e->getMessage()
            ], 500);
        }
    }


     public function designationsIndex()
    {
        $designations = Designation::where('status', 1)
            ->orderBy('designation_name', 'ASC')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $designations
        ]);
    }



    public function loginAdmin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email',
                'password' => 'required|min:8',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Invalid email or password.'
            ], 401);
        }
        
        try {
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'status' => 'success',
                'msg'    => 'Login successful.',
                'token'  => $token,
                'user'   => [
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email' => $user->email,
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'Authentication system not configured properly.'
            ], 500);
        }
    }

    public function getMyWork(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            $userDetails = User::with([
                'addresses','lastExp','lastsalary','userWorkInfo','lastExp','leaveRequests'])->find($user->id);

            $attendanceSummary = DB::table('attendance')
                ->select('status', DB::raw('COUNT(*) as total'))
                ->where('staff_id', $user->id)
                ->whereMonth('date', date('m'))
                ->whereYear('date', date('Y'))
                ->groupBy('status')
                ->get();
            $leaveSummary = LeaveRequest::select(
                'leave_types.name as leave_type_name',
                DB::raw('COUNT(leave_requests.id) as total')
            )
            ->join('leave_types', 'leave_types.id', '=', 'leave_requests.leave_type_id')
            ->where('leave_requests.created_by', $user->id)
            ->groupBy('leave_types.name')
            ->get();

            $jobApplications = DB::table('job_applications')
            ->where('user_id', $user->id)
            ->where('application_status', "accepted")
            ->get();

   
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }
            // Return user data without sensitive information
            return response()->json([
                'success' => true,
                'message' => 'Get my work successfully',
                'data' => $userDetails,
                'attendanceSummary' => $attendanceSummary,
                'leaveSummary' => $leaveSummary,
                "jobApplications" => $jobApplications
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's referral code and details
     */
    public function getReferralCode()
    {
        try {
            $user = Auth::guard('api')->user();

            // Generate referral code if not exists
            if (empty($user->referral_code)) {

                do {
                    $code = strtoupper(Str::random(8));
                } while (
                    User::where('referral_code', $code)->exists()
                );

                $user->referral_code = $code;
                $user->save();
            }

            $referralCount = ReferralReward::where('referrer_id', $user->id)->count();
            $totalEarnings = $user->referral_earnings ?? 0;

            return response()->json([
                'success' => true,
                'data' => [
                    'referral_code' => $user->referral_code,
                    'referral_link' => config('app.url') . '/signup?ref=' . $user->referral_code,
                    'referral_count' => $referralCount,
                    'total_earnings' => $totalEarnings,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get referral code',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Apply referral code during signup
     */
    public function applyReferralCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'referral_code' => 'required|string|exists:users,referral_code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid referral code',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::guard('api')->user();

            // Check if already referred
            if (!empty($user->referred_by)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Referral code already applied'
                ], 400);
            }

            // Get referrer
            $referrer = User::where('referral_code', $request->referral_code)->first();

            if ($referrer->id === $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot use your own referral code'
                ], 400);
            }

            // Apply referral
            $user->referred_by = $referrer->id;
            $user->save();
            $points = setting('points_per_action');
            $rewardAmount = $points['value'] ?? 10;
            // Create referral reward record and credit immediately
            ReferralReward::create([
                'referrer_id' => $referrer->id,
                'referred_id' => $user->id,
                'reward_amount' => $rewardAmount,
                'reward_type' => 'signup',
                'is_credited' => true,
                'credited_at' => now(),
            ]);
            // Update referrer's earnings
            $referrer->increment('referral_earnings', $rewardAmount);

            return response()->json([
                'success' => true,
                'message' => 'Referral code applied successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to apply referral code',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get referral history/earnings
     */
    public function getReferralHistory()
    {
        try {
            $user = Auth::guard('api')->user();

            $referrals = ReferralReward::with('referred:id,name,phone_number,image,created_at')
                ->where('referrer_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($reward) {
                    return [
                        'id' => $reward->id,
                        'referred_user' => $reward->referred ? [
                            'id' => $reward->referred->id,
                            'name' => $reward->referred->name,
                            'phone_number' => $reward->referred->phone_number,
                            'image' => $reward->referred->image,
                            'joined_at' => $reward->referred->created_at,
                        ] : null,
                        'reward_amount' => $reward->reward_amount,
                        'reward_type' => $reward->reward_type,
                        'is_credited' => $reward->is_credited,
                        'status' => $reward->is_credited ? 'completed' : 'pending',
                        'credited_at' => $reward->credited_at,
                        'created_at' => $reward->created_at,
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => [
                    'total_earnings' => $referrals->sum('reward_amount') ?? 0,
                    'referral_count' => $referrals->count(),
                    'referrals' => $referrals,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get referral history',
                'error' => $e->getMessage()
            ], 500);
        }
    }
        /**
     * Apply refer credit to job_user_limit in subscription_users
     * Credit amount = sum of (reward_amount / 10) for all uncredited rewards
     */
    public function applyReferCredit()
    {
        try {
            $user = Auth::guard('api')->user();

            // Check available referral earnings
            $availableEarnings = (float) ($user->referral_earnings ?? 0);

            if ($availableEarnings <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'No referral earnings available to redeem.',
                ], 400);
            }

            // Find the user's active subscription
            $subscription = SubscriptionUser::where('user_id', $user->id)
                ->where('status', 'active')->first();

            if (empty($subscription)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please subscribe to redeem rewards points.',
                ], 400);
            }

            // Each X points = 1 AI search credit
            $points = setting('points_per_action');
            $rate = $points['value'] ?? 10;
            $creditsToAdd = (int) ($availableEarnings / $rate);

            if ($creditsToAdd <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not enough points to redeem.',
                ], 400);
            }

            // Deduct earnings and give back AI searches by reducing used count
            $user->referral_earnings = 0;
            $user->save();

            // AI search uses 'user_limit' as usage counter and 'subscription_limit' as max cap
            // Decrease the used count to give back searches (but don't go below 0)
            $newUsedCount = max(0, $subscription->user_limit - $creditsToAdd);
            $subscription->user_limit = $newUsedCount;
            $subscription->save();

            // Get plan limit to show remaining searches
            $plan = Subscription::find($subscription->subscription_id);
            $remainingSearches = $plan ? ($plan->subscription_limit - $newUsedCount) : 0;

            return response()->json([
                'success' => true,
                'message' => 'Referral credit redeemed successfully! You have received ' . $creditsToAdd . ' AI search credits.',
                'data' => [
                    'points_redeemed' => $availableEarnings,
                    'credits_added' => $creditsToAdd,
                    'searches_used' => $newUsedCount,
                    'searches_remaining' => $remainingSearches,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to apply referral credit',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function otptest()
    {
        $number = "919725366212";

        $response = $this->sendOtp($number);

        return response()->json($response);
    }

}