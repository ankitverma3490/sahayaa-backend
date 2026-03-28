<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait SmsCountryTrait
{
    public function sendSms($number, $otp)
    {
        try {
            $url = "https://restapi.smscountry.com/v0.1/Accounts/" 
                . config('services.smscountry.auth_key') 
                . "/SMSes/";

            $auth = base64_encode(
                config('services.smscountry.auth_key') . ':' . config('services.smscountry.auth_token')
            );

            // curl_close($curl);
            $payloadone = json_encode([
                "Text" => "Welcome to Sahayya! Your verification code is {$otp}. Valid for 5 minutes. Please do not share this code with anyone.",
                "Number" => (string) $number,
                "SenderId" => "SAHYYA",
                // "TemplateId" => config('services.smscountry.template_id'), // 🔥 REQUIRED
                "DRNotifyUrl" => "https://www.domainname.com/notifyurl",
                "DRNotifyHttpMethod" => "POST",
                "Tool" => "API"
            ]);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>$payloadone,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Basic '.$auth
                ),
            ));

            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (curl_errno($curl)) {
                $error = curl_error($curl);
                curl_close($curl);

                return [
                    'success' => false,
                    'status'  => 500,
                    'body'    => $error,
                ];
            }
            curl_close($curl);

            return [
                'success' => ($httpCode >= 200 && $httpCode < 300),
                'status'  => $httpCode,
                'body'    => json_decode($response, true) ?? $response,
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'status'  => 500,
                'body'    => $e->getMessage(),
            ];
        }
    }

    // ✅ OTP Method
    public function sendOtp($number,$otp)
    {
        // $message = "Welcome to Sahayya! Your verification code is otp: " . $otp . " Valid for 5 minutes.Please do not share this code with anyone.";
        $response = $this->sendSms($number, $otp);
        return [
            'success' => $response['success'],
            'otp'     => $otp,
            'api'     => $response
        ];
    }
}