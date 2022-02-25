<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;

class SearchController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
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
            $products = $this->repository->searchQuery($search);
            return view('admin.homepage.index', compact('products'));
            // return redirect()->back()->with(['success' => 'Result found '.$search], $products);
         } else {
            $products = $this->repository->paginateData(10);
            return view('admin.homepage.index', compact('products'));
            // return redirect()->back()->with(['warning' => 'Unable to find product '.$search], $products);
         }

    }
}
