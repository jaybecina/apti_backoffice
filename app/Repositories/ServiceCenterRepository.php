<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\ServiceCenter;

class ServiceCenterRepository extends BaseRepository
{

    public function __construct(ServiceCenter $serviceCenter)
    {
        $this->model = $serviceCenter;
    }

    public function getAllWithRegion()
    {
        return $this->model->with('region')->latest()->paginate(10);
    }

    public function sortToLatest()
    {
        return $this->model->with('region')->latest()->get();
    }

    public function filterList($keyword, $paginate = 4, $region = null)
    {
        return $this->model->with('region')
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('location', 'like', "%{$keyword}%"); })
            ->when(isset($region), function ($query) use ($region) {
                $query->where('region_id',$region); })
            ->paginate($paginate);
    }

    public function searchQuery($query)
    {
        return $this->model
            ->where('location', 'like', "%{$query}%")
            ->orWhere('address', 'like', "%{$query}%")
            ->paginate(10);
    }

    public function searchByName($keyword)
    {
        return $this->model
                ->where('location', 'like', "%{$keyword}%")
                ->orWhere('address', 'like', "%{$keyword}%")
                ->get();
    }

}
