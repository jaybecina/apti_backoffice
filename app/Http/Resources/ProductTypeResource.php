<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class ProductTypeResource extends JsonResource
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
            'id'                =>      $this->id,
            'type_name'         =>      $this->name,
            'image_url_path'    =>      $this->image_url_path,
            'products'          =>      ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
