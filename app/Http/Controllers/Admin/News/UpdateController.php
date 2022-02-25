<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\NewsService;
use App\Http\Requests\UpdateNewsRequest;

class UpdateController extends Controller
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
    public function __invoke(UpdateNewsRequest $request, $id)
    {

        try {
            $news = $this->service->update($id, $request->only('title', 'category_id', 'description'));
            if($request->hasFile('news_image')){
                $this->service->updateNewsImage($news, $request->only('news_image'));
            }
            return redirect()->back()->with('success', 'News was successfully updated!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
