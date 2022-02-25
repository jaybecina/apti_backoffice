<?php

namespace App\Http\Controllers\Admin\News\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\NewsCategoryService;

use App\Http\Requests\StoreNewsCategoryRequest;

class StoreController extends Controller
{
    private $service;
    public function __construct(NewsCategoryService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreNewsCategoryRequest $request)
    {
        try {
            $this->service->store($request->only('name', 'description'));
            return redirect()->back()->with('success', 'News Category was successfully saved!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
