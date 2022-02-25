<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;

use App;

class ShowController extends Controller
{
    private $repository;

    public function __construct(NewsRepository $repository)
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
        $news = $this->repository->getById($id);
        $news_categories = App::make(NewsCategoryRepository::class)->all();
        return view('admin.news.show', compact('news', 'news_categories'));
    }
}
