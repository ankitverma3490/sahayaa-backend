<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SmsCountryTrait
{
    public function sendSms($number, $message)
    {
        $url = "https://api.smartping.in/sms/send";

        // $response = Http::timeout(15)
        //     ->withBasicAuth(
        //         config('services.smscountry.auth_key'),
        //         config('services.smscountry.auth_token')
        //     )
        //     ->asForm()
        //     ->post($url, [
        //         'Text'        => 123456, //$message,
        //         'Number'      => 9725366212, //$number, // 91XXXXXXXXXX
        //         'SenderId'    => config('services.smscountry.sender_id'),
        //         'DRNotifyUrl' => config('services.smscountry.dr_url'),
        //         'Tool'        => 'API'
        //     ]);

        // return [
        //     'success' => $response->successful(),
        //     'status'  => $response->status(),
        //     'body'    => $response->body(),
        // ];

        $message = "codes is 4555";
        $number = "919725366212";
        $response = Http::get('https://bulksmsapi.vispl.in/', [
            'username'    => config('services.smscountry.auth_key'),
            'password'    => config('services.smscountry.auth_token'),
            'messageType' => 'text',
            'mobile'      => $number, // 919XXXXXXXXX
            'senderId'    => config('services.smscountry.sender_id'),
            'ContentID'   => "1707177400205239453",
            'message'     => urlencode($message),
        ]);

        return [
            'success' => $response->successful(),
            'status'  => $response->status(),
            'body'    => $response->body(),
        ];
    }
}