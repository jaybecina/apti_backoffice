<?php

namespace App\Http\Controllers\Admin\ServiceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ServiceCenterRepository;

use App\Repositories\RegionRepository;
use App;

class ShowController extends Controller
{
    private $repository;

    public function __construct(ServiceCenterRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $regions = App::make(RegionRepository::class)->all();
        $service_center = $this->repository->getById($id);
        return view('admin.service_center.show', compact('regions', 'service_center'));
    }
}
