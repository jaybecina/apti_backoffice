<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ServiceCenterRepository;

use App\Http\Resources\ServiceCenterResource;
use App\Http\Resources\ServiceCenterCollection;

class ServiceCenterController extends Controller
{
    private $repository;

    public function __construct(ServiceCenterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function service_centers()
    {
        try {
            $service_centers = $this->repository->sortToLatest();
            return ServiceCenterCollection::make($service_centers);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'No data found']);
        }
    }

    public function getServiceCentersPerId($id)
    {
        try {
            $service_center = $this->repository->getById($id);
            return new ServiceCenterResource($service_center);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function service_centers_search(Request $request)
    {
        //keyword
        try {
            if ($request->has('keyword')) {
                $service_centers = $this->repository->searchByName($request->keyword);
                if (count($service_centers) > 0) {
                    return ServiceCenterCollection::make($service_centers);
                }
                return response()->json(['error' => 'No service center found.']);
            }
            return response()->json(['error' => 'Please input some keyword.']);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }
}
