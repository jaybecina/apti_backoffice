<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RegionResource;

class ServiceCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'location'      => $this->location,
            'address'       => $this->address,
            'office_hours'  => $this->office_hours,
            'map_link'      => $this->map_link,
            'region'        => new RegionResource($this->region),
        ];
    }
}
