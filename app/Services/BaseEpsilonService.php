<?php

namespace App\Services;

use Illuminate\Http\Response;

class BaseEpsilonService
{
    /** @var EpsilonClient */
    protected $epsilonClient;

    public function __construct(EpsilonClient $epsilonClient)
    {
        $this->epsilonClient = $epsilonClient;
    }

    public function executeService($service, $id = null)
    {
        $response = $this->validateToken();
        if(!empty($response['errors']))
        {
            return $response;
        }

        if($id)
        {
            return $this->epsilonClient->{$service}($id, $response['response']['access_token']);
        }

        return $this->epsilonClient->{$service}($response['response']['access_token']);
    }

    public function validateToken(): array
    {
        $token = $this->epsilonClient->getAccessToken();
        if($token['statusCode'] != Response::HTTP_OK)
        {
            if($token['statusCode'] == Response::HTTP_UNAUTHORIZED)
            {
                return ['errors' => ['Unauthorized' => $token['response']['message']]];
            }
            return ['errors' => $token['response']['errors']];
        }

        return $token;
    }
}
