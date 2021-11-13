<?php


namespace App\Services;


use Illuminate\Http\Response;

class BaseEpsilonService
{
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

        return [];
    }
}