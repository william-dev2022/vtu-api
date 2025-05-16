<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;
    protected $verifySid;

    public function __construct()
    {
        $this->twilio = new Client(
            config('services.twilio.sid'),
            config('services.twilio.auth_token')
        );

        $this->verifySid = config('services.twilio.verify_sid');

        Log::info(config('services.twilio.auth_token'));
        Log::info(config('services.twilio.sid'));
        Log::info(config('services.twilio.verify_sid'));
    }

    public function sendVerificationCode($phoneNumber)
    {
        return $this->twilio->verify->v2->services($this->verifySid)
            ->verifications
            ->create($phoneNumber, "sms");
    }

    public function checkVerificationCode($phoneNumber, $code)
    {
        return $this->twilio->verify->v2->services($this->verifySid)->verificationChecks->create([
            'to' => $phoneNumber,  // MUST start with '+' and country code
            'code' => $code,
        ]);
    }
}
