<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;

use App\Models\ProductType;
use App;

class IndexController extends Controller
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
        $product_types = App::make(ProductType::class)->all();
        $paginate = 10;

        $products = $this->repository
            ->filterList($request->keyword,$paginate,$request->type_id);

        return view('admin.homepage.index', compact('products','product_types'));
    }
}
