<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\News;

class NewsRepository extends BaseRepository
{

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function sortToLatest()
    {
        return $this->model->with('category')->latest()->get();
    }

    public function paginateLatestData($page = 4)
    {
        return $this->model->with('category')->latest()->paginate($page);
    }

    public function filterList($keyword, $paginate = 4, $category = null)
    {
        return $this->model->with('category')
            ->when(isset($keyword), function ($query) use ($keyword) { 
                $query->where('title', 'like', "%{$keyword}%"); })
            ->when(isset($category), function ($query) use ($category) {
                $query->where('category_id',$category); })
            ->paginate($paginate);
    }
}
