<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductService;
use App\Repositories\ProductRepository;

use App\Http\Requests\UpdateProductRequest;
use Validator;

class UpdateController extends Controller
{
    private $service;
    private $repository;

    public function __construct(ProductService $service, ProductRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;

    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateProductRequest $request, $id)
    {
        try {
            $product = $this->service->update($id, $request->only('header_title', 'name', 'description', 'is_featured', 'price', 'type_id'));
            if($request->hasFile('image')){
                $this->service->updateProductImage($product, $request->only('image'));
            }
            return redirect()->back()->with('success', 'Product was successfully updated!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
