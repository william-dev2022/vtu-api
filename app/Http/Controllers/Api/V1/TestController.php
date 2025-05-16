<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ApiRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function __construct(protected ApiRequestService $apiRequestService)
    {
        $this->apiRequestService = $apiRequestService;
    }



    public function  get_plans(Request $request)
    {

        // $table->string('network'); // mtn, glo, airtel, etc.
        // $table->string('plan_id'); // e.g., MTN500MB
        // $table->string('name'); // e.g., 500MB Daily
        // $table->decimal('price', 12, 2);
        // $table->string('category')->nullable(); // optional, e.g., 'daily', 'weekly', 'monthly', 'social', 'streaming'
        // $table->decimal('reseller_price', 12, 2)->nullable(); // optional
        // $table->string('validity'); // e.g., 1 day
        // $table->string('status')->default('active');


        $response =  $this->apiRequestService->get('get/plans');

        $response_data = $response['data'] ?? null;

        if ($response_data) {
            $formated_response = [];

            foreach ($response_data as $data) {
                // return $data['plan'];
                if (
                    in_array($data['subcategory_id'], [1, 2, 3, 4, 5, 6, 7, 8]) &&
                    isset($data['plan']) &&
                    is_array($data['plan'])
                ) {

                    foreach ($data['plan'] as $plan) {
                        $formated_response[] = [
                            'name' => $plan['plan'],
                            'plan_id' => $plan['plan'],
                            'price' => $plan['amount'],
                            'reseller_price' => $plan['amount'],
                            'desciption' => $data['title'],
                            'network' => explode(' ', $data['title'])[0],
                            'category' => $this->validity($plan['plan'])['category'],
                            'displayTitle' => $this->validity($plan['plan'])['display_title'],
                        ];
                    }
                }
            }

            return response()->json([
                'message' => 'Plans retrieved successfully.',
                'data' => $formated_response,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to retrieve plans.',
            ], 500);
        }
    }



    protected function validity(string $title)
    {
        $title = strtolower($title);
        $displayTitle = explode('for ', $title);
        $splitedTitle = explode('for ', $title);

        $splitedTitle =  trim(end($splitedTitle));



        $category =  '';


        $daily = ['1 day', '2 days', '3 days', '4 days', '5 days'];
        $weekly = ['10 days', '12 days', '14 days', '22 days', 'weekly', '7 days'];
        $montly = ['30 days', '60 days', '120 days', '90 days', 'month', 'monthly', 'Monthly', '4 weeks', '30days', '60days', '90 days', '90days', '120 days', '120days'];

        if (in_array($splitedTitle, $daily)) {
            $displayTitle = $displayTitle[0];
            $category =  'daily';
        } else if (in_array($splitedTitle, $weekly)) {
            $displayTitle = $displayTitle[0];
            $category = 'weekly';
        } else if (in_array($splitedTitle, $montly)) {
            $displayTitle = $displayTitle[0];
            $category = 'monthly';
        } else {
            $displayTitle = $title;
            if (str_contains($title, 'daily')) {
                $category = 'daily';
            } else if (str_contains($title, 'weekly')) {
                $category = 'weekly';
            } else if (str_contains($title, 'monthly',)) {
                $category = 'monthly';
            } else {
                $category = null;
            }
        }

        return [
            'category' => $category,
            'validity' => $splitedTitle,
            'display_title' => $displayTitle,
        ];
    }
}
