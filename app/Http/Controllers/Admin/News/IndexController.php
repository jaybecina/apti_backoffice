<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;

use App;

class IndexController extends Controller
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
    public function __invoke(Request $request)
    {
        $news_categories = App::make(NewsCategoryRepository::class)->all();

        $paginate = 10;

        $news_array = $this->repository
            ->filterList($request->keyword,$paginate,$request->category_id);

        return view('admin.news.index', compact('news_array', 'news_categories'));
    }
}
