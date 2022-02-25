<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\NewsCategory;

class NewsCategoryRepository extends BaseRepository
{

    public function __construct(NewsCategory $newsCategory)
    {
        $this->model = $newsCategory;
    }

    public function sortToLatest()
    {
        return $this->model->latest()->paginate(10);
    }

    public function filterList($keyword, $paginate = 4)
    {
        return $this->model
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%"); })
            ->paginate($paginate);
    }

}
