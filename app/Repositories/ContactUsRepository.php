<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\ContactUs;

class ContactUsRepository extends BaseRepository
{

    public function __construct(ContactUs $contactUs)
    {
        $this->model = $contactUs;
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
