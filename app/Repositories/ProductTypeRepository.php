<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\ProductType;

class ProductTypeRepository extends BaseRepository
{

    public function __construct(ProductType $productType)
    {
        $this->model = $productType;
    }

    public function getProductsPerProductType(int $id)
    {
        return $this->model->find($id)->with('products')->first();
    }

    public function filterList($keyword, $paginate = 4)
    {
        return $this->model
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%"); })
            ->paginate($paginate);
    }
}
