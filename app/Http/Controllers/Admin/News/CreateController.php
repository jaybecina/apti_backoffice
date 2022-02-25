<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\NewsCategoryRepository;
use App;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $news_categories = App::make(NewsCategoryRepository::class)->all();
        return view('admin.news.create', compact('news_categories'));
    }
}
