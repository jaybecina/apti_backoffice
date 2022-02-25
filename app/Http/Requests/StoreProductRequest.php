<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'header_title'      =>      'required|max:50',
            'name'              =>      'required|max:50',
            'description'       =>      'required|max:250',
            'price'             =>      'required|numeric',
            'type_id'           =>      'required',
            'image'             =>      'required|mimes:png|max:10000', //10000kb
        ];
    }
}
