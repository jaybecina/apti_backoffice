<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\NewsCategory;

class NewsCategoryService extends BaseService
{

    public function __construct(NewsCategory $newsCategory)
    {
        $this->model = $newsCategory;
    }
}
