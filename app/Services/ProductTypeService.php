<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\ProductType;

use URL;

class ProductTypeService extends BaseService
{

    public function __construct(ProductType $productType)
    {
        $this->model = $productType;
    }

    public function updateProductTypeImage(ProductType $product_type, $request)
    {
        $this->transaction(function() use ($product_type, $request) {
            $base_url = URL::to('/');
            $image_path = $request['image']->store('uploads/products/types', 'public');

            $product_type->image = $image_path;
            $product_type->image_url_path = $base_url ."/storage/". $image_path;
            $product_type->save();
            return $product_type;
        });
    }
}
