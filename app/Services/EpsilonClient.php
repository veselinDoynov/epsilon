<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class EpsilonClient
{
    protected $url;

    protected $grandType;

    protected $clientSecret;

    protected $clientId;

    public const GRAND_TYPE = 'client_credentials';

    public const AUTHENTICATE_URL = '/api/oauth2/access-token';

    public const LIST_SERVICES = '/api/services';

    public const API_HEADERS = ['Accept' => 'application/vnd.cloudlx.v1+json'];

    /**
     * ChopClient constructor.
     */
    public function __construct()
    {
        $this->url = env('EPSILON__BASE_URL');
        $this->clientSecret = env('EPSILON_CLIENT_SECRET');
        $this->clientId = env('EPSILON_CLIENT_ID');
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): array
    {
        $data = [
            'grant_type' => self::GRAND_TYPE,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];

        $response = Http::asForm()
            ->withHeaders(self::API_HEADERS)
            ->post($this->url.self::AUTHENTICATE_URL, $data);


        return ['response' => $response->json(), 'statusCode' => $response->status()];

    }

    public function getServices(string $token): ?array
    {
        $headers = array_merge(self::API_HEADERS, ['Authorization' => 'Bearer ' . $token]);

        $response = Http::withHeaders($headers)
            ->get($this->url . self::LIST_SERVICES);

        $result = $response->json();

        return $result ?? [];
    }

    public function getService(int $id, string $token): ?array
    {
        $headers = array_merge(self::API_HEADERS, ['Authorization' => 'Bearer ' . $token]);

        $response = Http::withHeaders($headers)
            ->get($this->url . self::LIST_SERVICES.'/'.$id.'/service');

        $result = $response->json();

        return $result ?? [];
    }
}
