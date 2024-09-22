<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

if (!function_exists("send_otp_sms")) {
    function send_otp_sms($phone, $apiRequestPin = null, $apiKey = null, $secretKey = null)
    {
        $apiRequestPin  = "https://apisms.beem.africa/v1/send";
        $apiKey         = "";
        $secretKey      = "";
        $smsCount       = 10;

        $postData = [
            "source_addr" => "",
            "schedule_time" => '',
            "encoding" => 0,
            "message" => 'Your OTP Is '. rand(123456, 999999),
            "recipients" => [
                [
                    "recipient_id" => 1,
                    "dest_addr" => $phone
                ]
            ]
        ];

        $response = Http::withBasicAuth($apiKey, $secretKey)->accept('application/json')->post($apiRequestPin, $postData);
        Log::info('SMS Code: ' . $response->body());
    }
}
