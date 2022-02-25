<?php

namespace App\Http\Controllers\Admin\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Repositories\ProductTypeRepository;

class IndexController extends Controller
{
    private $repository;

    public function __construct(ProductTypeRepository $repository)
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

        $product_type = $this->repository
            ->filterList($request->keyword, $paginate);

        return view('admin.homepage.type.index', compact('product_type'));
    }
}
