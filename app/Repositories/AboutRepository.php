<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\About;

class AboutRepository extends BaseRepository
{

    public function __construct(About $about)
    {
        $this->model = $about;
    }

    public function findNameValue($value)
    {
        return $this->model->where('name', $value)->first();
    }

    public function pluck(Type $var = null)
    {
        return $this->model->pluck('value', 'name')->toArray();
    }

}
