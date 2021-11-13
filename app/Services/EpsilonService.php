<?php

namespace App\Services;

class EpsilonService extends BaseEpsilonService
{
    /** @var EpsilonClient */
    protected $epsilonClient;

    public function __construct(EpsilonClient $epsilonClient)
    {
        $this->epsilonClient = $epsilonClient;
    }

    public function listServices()
    {
        $errors = $this->validateToken($this->epsilonClient);
        if($errors)
        {
            return $errors;
        }

        return $this->epsilonClient->getServices();
    }

    public function getService(int $id)
    {
        $errors = $this->validateToken($this->epsilonClient);
        if($errors)
        {
            return $errors;
        }

        return $this->epsilonClient->getService($id);
    }
}
