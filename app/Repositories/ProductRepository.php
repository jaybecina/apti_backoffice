<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository
{

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function featuredProducts()
    {
        return $this->model->where('is_featured', true)->latest()->get();
    }

    public function allSortLatest()
    {
        return $this->model->with('type')->latest()->paginate(12);
    }

    public function searchQuery($query)
    {
        return $this->model
            ->where('name', 'like', "%{$query}%")
            ->paginate(10);
    }

    public function filterList($keyword, $paginate = 4, $type = null)
    {
        return $this->model->with('type')
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%"); })
            ->when(isset($type), function ($query) use ($type) {
                $query->where('type_id',$type); })
            ->paginate($paginate);
    }

    public function getProductByName($keyword)
    {
        return $this->model->where('name', 'like', '%'.$keyword.'%');
    }

    public function getProductByProductType($type_id)
    {
        return $this->model->where('type_id', $type_id);
    }

}
