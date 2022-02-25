<?php

namespace App\Http\Controllers\Admin\ServiceCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ServiceCenterRepository;


class SearchController extends Controller
{
    private $repository;

    public function __construct(ServiceCenterRepository $repository)
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
        $search = trim($request->keyword);

         if(!empty($search)) {
            $service_centers = $this->repository->searchQuery($search);
            return view('admin.service_center.index', compact('service_centers'));
            // return redirect()->back()->with(['success' => 'Result found '.$search], $products);
         } else {
            $service_centers = $this->repository->getAllWithRegion();
            return view('admin.service_center.index', compact('service_centers'));
            // return redirect()->back()->with(['warning' => 'Unable to find product '.$search], $products);
         }
    }
}
