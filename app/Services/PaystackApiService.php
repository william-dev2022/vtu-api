<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaystackApiService
{
    protected $client;

    public function __construct()
    {
        // Set default config here (e.g., base URL and headers)
        $this->client = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . config('services.paystack.secret'), // optional
        ])->baseUrl(config('services.paystack.base_url')); // set your base URL in config/services.php
    }

    /**
     * Perform a GET request
     */
    public function get(string $endpoint, array $params = [])
    {
        return $this->client->get($endpoint, $params);
    }

    /**
     * Perform a POST request
     */
    public function post(string $endpoint, array $data = [])
    {
        return $this->client->post($endpoint, $data);
    }
}
