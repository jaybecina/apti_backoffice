<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Customer;

class CustomerRepository extends BaseRepository
{

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function getByType($type)
    {
        return $this->model->where('type', $type)->latest()->get();
    }

    public function filterList($keyword, $paginate = 4)
    {
        return $this->model
            ->when(isset($keyword), function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%"); })
            ->paginate($paginate);
    }

}
