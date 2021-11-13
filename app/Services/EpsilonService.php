<?php

namespace App\Services;

class EpsilonService extends BaseEpsilonService
{
    public function listServices()
    {
        return $this->executeService('getServices');
    }

    public function getService(int $id)
    {
        return $this->executeService('getService', $id);
    }
}
