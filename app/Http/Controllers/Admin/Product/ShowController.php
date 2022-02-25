<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ProductRepository;
use App\Models\ProductType;
use App;

class ShowController extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $product = $this->repository->getById($id);
        $product_type = App::make(ProductType::class)->all();
        return view('admin.homepage.show', compact('product', 'product_type'));
    }
}
