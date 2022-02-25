<?php

namespace App\Http\Controllers\Admin\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ProductTypeService;
use App\Http\Requests\UpdateProductTypeRequest;

class UpdateController extends Controller
{
    private $service;

    public function __construct(ProductTypeService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateProductTypeRequest $request, $id)
    {
        try {
            $product_type = $this->service->update($id, $request->only('name', 'description', 'image'));
            if($request->hasFile('image')){
                $this->service->updateProductTypeImage($product_type, $request->only('image'));
            }
            return redirect()->back()->with('success', 'Product Type was successfully updated!');
        } catch (\Throwable $th) {
            \Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Ops! Something went wrong. Error Message: ' . $th->getMessage());
        }
    }
}
