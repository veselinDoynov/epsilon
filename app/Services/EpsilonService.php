<?php

namespace App\Services;

class EpsilonService extends BaseEpsilonService
{
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
