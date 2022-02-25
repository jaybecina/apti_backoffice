<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Product;

use URL;


class ProductService extends BaseService
{

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function updateProductImage(Product $product, $request)
    {
        $this->transaction(function() use ($product, $request) {
            $base_url = URL::to('/');
            $image_path = $request['image']->store('uploads/products', 'public');

            $product->image = $image_path;
            $product->image_url_path = $base_url ."/storage/". $image_path;
            $product->save();
            return $product;
        });
    }
}
