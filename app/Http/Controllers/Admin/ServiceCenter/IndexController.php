<?php

namespace App\Http\Controllers\Admin\ServiceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\ServiceCenterRepository;

use App\Models\Region;
use App;

class IndexController extends Controller
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
    public function __invoke(Request $request)
    {
        $regions = App::make(Region::class)->all();

        // $service_centers = $this->repository->getAllWithRegion();
        
        $paginate = 10;

        $service_centers = $this->repository
            ->filterList($request->keyword,$paginate,$request->region_id);

        return view('admin.service_center.index', compact('service_centers', 'regions'));
    }
}
