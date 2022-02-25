<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\NewsService;

use App\Http\Requests\StoreNewsRequest;

class StoreController extends Controller
{
    private $service;
    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreNewsRequest $request)
    {
        try {
            $news = $this->service->store($request->only('title', 'category_id', 'description'));
            $this->service->updateNewsImage($news, $request->only('news_image'));
            return redirect()->back()->with('success', 'News was successfully saved!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
