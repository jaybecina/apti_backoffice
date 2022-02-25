<?php

namespace App\Http\Controllers\Admin\News\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\NewsCategoryService;

class MultipleDeleteController extends Controller
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
    public function __invoke(Request $request)
    {
        try {
            $ids = explode("|", $request->ids);
            foreach($ids as $id) {
                if($id != ""){
                    $this->service->delete($id);
                }
            }

            return redirect()->back()->with('success', 'Selected news categories was successfully deleted!');

        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
