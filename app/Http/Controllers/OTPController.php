<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\OTPRequest;
use App\Models\UserOTP;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PHPUnit\Util\Json;

class OTPController extends Controller
{
    public function sendOTP(OTPRequest $req)
    {
        $req->validated();

        $userOtp = UserOTP::create(['phone' => $req->phone]);

        $postData = [
            "source_addr" => "INFO",
            "schedule_time" => '',
            "encoding" => 0,
            "message" => "UVCCM OTP  " . $userOtp->otp,
            "recipients" => [
                [
                    "recipient_id" => 1,
                    "dest_addr" => $req->phone
                ]
            ]
        ];

        try {
            $response = Http::withBasicAuth(config('app.sms_apiKey'), config('app.sms_secretKey'))->accept('application/json')->post('https://apisms.beem.africa/v1/send', $postData);
            if ($response->json()['code'] == 100) {
                Log::info('SMS Code: ' . $response->json()['code']);


                Log::info('SMS sent successfully: ' . $response->body());
                return $response->body();
            } else {
                Log::error('SMS sending failed. Response: ' . $response->body());
                return false;
            }

        } catch (\Exception $e) {
            Log::error('Error sending SMS: ' . $e->getMessage());
            return false;
        }

        return ApiResponse::success($userOtp->otp, 'OTP sent successfully.');
    }

    public function verifyOTP(OTPRequest $req)
    {
        try {
            $req->validated();

            $userOtp = UserOTP::where('phone', $req->phone)->where('otp', $req->otp)->where('status',0)->first();
            if (!$userOtp) {
                return ApiResponse::error('Invalid OTP.', JsonResponse::HTTP_UNAUTHORIZED);
            }elseif(!$userOtp && Carbon::now()->isAfter($userOtp->expire_at)){
                return ApiResponse::error('Invalid OTP, Request new.', JsonResponse::HTTP_UNAUTHORIZED);
            }

            $userOtp->update(['expire_at' => Carbon::now(), 'status' => true]);

            return ApiResponse::success([],'OTP verified successfully.');

        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
