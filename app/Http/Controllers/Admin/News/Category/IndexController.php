<?php

namespace App\Http\Controllers\Admin\News\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\NewsCategoryRepository;

class IndexController extends Controller
{
    private $repository;

    public function __construct(NewsCategoryRepository $repository)
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
        $paginate = 10;

        $categories = $this->repository
            ->filterList($request->keyword, $paginate);

        return view('admin.news.category.index', compact('categories'));
    }
}
