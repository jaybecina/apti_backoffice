<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Region;

class RegionRepository extends BaseRepository
{

    public function __construct(Region $region)
    {
        $this->model = $region;
    }

}
