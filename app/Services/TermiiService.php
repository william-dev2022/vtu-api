<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class TermiiService
{
    protected $client;

    public function __construct()
    {
        // Set default config here (e.g., base URL and headers)
        $this->client = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->retry(3, 1000)->baseUrl(config('services.termii.base_url')); // set your base URL in config/services.php
    }

    public function sendVerificationCode($phoneNumber)
    {
        return $this->client->post('api/sms/otp/send', [
            'api_key' => config('services.termii.secret'), // Your Termii API key
            'to' => $phoneNumber,  // MUST start with '+' and country code
            'from' => config('app.name'), // or any sender ID you want to use
            'message_type' => 'NUMERIC', // or 'ALPHANUMERIC' for text messages
            'pin_time_to_live' => 5, // Time in minutes for the code to be valid
            'pin_length' => 6, // Length of the verification code
            "channel" => "dnd",
            "pin_placeholder" => "< 1234 >",
            "message_text" => "Your verification pin is < 1234 >",
        ]);
    }

    public function checkVerificationCode($code, $plan_id)
    {
        return $this->client->post('/api/sms/verify', [
            'api_key' => config('services.termii.secret'), // Your Termii API key
            'pin_id' => $plan_id,
            'pin' => $code, // The verification code to check
        ]);
    }
}
