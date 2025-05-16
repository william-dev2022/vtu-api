<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\TwilioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class UserAuthenticationController extends Controller
{


    public function __construct(protected TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15', 'unique:users,phone_number'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Check if the user already exists
        $existingUser = User::where('phone_number', $request->phone_number)->first();

        if ($existingUser) {
            return response()->json([
                'message' => 'User already exists. Please login or reset your password.',
            ], 409);
        }


        try {
            // Create a new user instance
            $user = User::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('Redmi 13 c')->plainTextToken;

            return response()->json([
                'message' => 'Registration successful. phone number.',
                'user' => new UserResource($user->fresh()),
                'token' => $token
            ], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], [500]);
        }
    }


    // - login: to authenticate a user and generate an access token
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Check if the user exists
        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }

        // Generate an access token 
        $token = $user->createToken('Redmi 13 c')->plainTextToken;


        return response()->json([
            'message' => 'Login successful.',
            'token' => $token,
            'user' => new UserResource($user->fresh()),
        ], 200);
    }


    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'string', 'max:15'],
        ]);

        // Check if the user exists
        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }

        //send a verification token to the user's phone number
        $verification = $this->twilio->sendVerificationCode($user->phone_number);

        return response()->json([
            'message' => 'Verification code sent successfully.',
            'data' => $verification
        ], 200);
    }



    public function logout(Request $request)
    {

        // Invalidate the user's token
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout successful.',
        ], 200);
    }



    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'string', 'max:15'],
            'new_password' => ['required', 'string', 'min:8'],
            'pin' => ['required', 'string', 'min:4', 'max:10'],
        ]);

        // Check if the user exists
        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password reset successful.',
        ], 200);
    }


    public function checkVerificationCode(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'string', 'max:6'],
        ]);

        // Check if the user exists
        $user = User::where('phone_number', $request->user()->phone_number)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }

        if ($user->isVerified) {
            return response()->json([
                'message' => 'Phone number already verified.',
                'user' => new UserResource($user),
            ], 200);
        }

        //delete all previous token
        $request->user()->tokens()->delete();


        // generate a new token
        $token = $user->createToken('Redmi 13 c')->plainTextToken;


        $user->is_verified = true;
        $user->save();
        return response()->json([
            'message' => 'Phone number verified successfully.',
            'token' => $token,
            'user' => new UserResource($user),
        ], 200);

        try {
            $verification = $this->twilio->checkVerificationCode($user->phone_number, $request->verification_code);

            if ($verification->valid) {
                $user->isVerified = true;
                $user->save();
                return response()->json([
                    'message' => 'Phone number verified successfully.',
                    'data' => $verification
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Invalid verification code.',
                ], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while verifying the code.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
