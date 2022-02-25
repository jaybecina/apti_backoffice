<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Partner;

class PartnerRepository extends BaseRepository
{

    public function __construct(Partner $partner)
    {
        $this->model = $partner;
    }

    public function sortToLatest()
    {
        return $this->model->latest()->get();
    }

    public function filterList($keyword, $paginate = 4)
    {
        return $this->model
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%"); })
            ->paginate($paginate);
    }

}
