<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;

use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsCollection;

use App\Http\Resources\NewsCategoryResource;
use App\Http\Resources\NewsCategoryCollection;

use App;

class NewsController extends Controller
{
    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }
    public function news()
    {
        try {
            $news = $this->repository->paginateLatestData();
            return NewsCollection::make($news);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function news_category()
    {
        try {
            $category = App::make(NewsCategoryRepository::class)->all();
            return NewsCategoryCollection::make($category);
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }

    public function getNewsPerId($id)
    {
        try {
            return new NewsResource($this->repository->getById($id));
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return response()->json(['error' => 'No data found']);
        }
    }
}
