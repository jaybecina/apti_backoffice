<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Partner;

use URL;

class PartnerService extends BaseService
{

    public function __construct(Partner $partner)
    {
        $this->model = $partner;
    }

    public function updatePartnerImage(Partner $partner, $request)
    {

        $this->transaction(function() use ($partner, $request) {
            $base_url = URL::to('/');
            $image_path = $request['image']->store('uploads/partners', 'public');

            $partner->image = $image_path;
            $partner->image_url_path = $base_url ."/storage/". $image_path;
            $partner->save();
            return $partner;
        });
    }

}
