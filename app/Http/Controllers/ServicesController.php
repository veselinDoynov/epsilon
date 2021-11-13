<?php

namespace App\Http\Controllers;

use App\Services\EpsilonService;
use App\Traits\ApiResponser;

class ServicesController extends Controller
{
    use ApiResponser;

    protected $epsilonService;

    public function __construct(EpsilonService $epsilonService) {
        $this->epsilonService = $epsilonService;
    }

    public function listEpsilonServices()
    {
        $services = $this->epsilonService->listServices();

        return view('listServices', ['data' => $services]);
    }

    public function getEpsilonService(int $id)
    {
        $service = $this->epsilonService->getService($id);
        return view('getService', ['data' => $service]);
    }
}
