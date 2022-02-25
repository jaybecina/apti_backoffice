<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;

use App\Http\Requests\StoreProductRequest;
use URL;

class StoreController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreProductRequest $request)
    {

        try {
            $request['is_featured'] = $request->has('is_featured') ? true : false;
            $product = $this->service->store($request->only('header_title', 'name', 'description', 'is_featured', 'price', 'type_id'));
            $this->service->updateProductImage($product, $request->only('image'));
            return redirect()->back()->with('success', 'Product was successfully saved!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
