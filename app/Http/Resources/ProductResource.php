<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductTypeResource;

class ProductResource extends JsonResource
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
            'id'                    => $this->id,
            'header_title'          => $this->header_title,
            'product_name'          => $this->name,
            'product_description'   => $this->description,
            'product_price'         => $this->price,
            'product_type'          => new ProductTypeResource($this->type),
            'image_url_path'        => $this->image_url_path,
        ];
    }
}
