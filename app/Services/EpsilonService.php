<?php

namespace App\Services;


use Illuminate\Http\Response;

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
        $errors = $this->validateToken();
        if($errors)
        {
            return $errors;
        }

        return $this->epsilonClient->getServices();
    }

    public function getService(int $id)
    {
        $errors = $this->validateToken();
        if($errors)
        {
            return $errors;
        }

        return $this->epsilonClient->getService($id);
    }
}
