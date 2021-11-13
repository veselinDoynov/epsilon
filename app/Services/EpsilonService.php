<?php

namespace App\Services;

class EpsilonService extends BaseEpsilonService
{
    public function listServices()
    {
        $response = $this->validateToken();
        if(!empty($response['errors']))
        {
            return $response;
        }

        return $this->epsilonClient->getServices($response['response']['access_token']);
    }

    public function getService(int $id)
    {
        $response = $this->validateToken();
        if(!empty($response['errors']))
        {
            return $response;
        }

        return $this->epsilonClient->getService($id, $response['response']['access_token']);
    }
}
