<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'title'             =>      'required|max:50',
            'description'       =>      'required|max:1000',
            'category_id'       =>      'required',
            'news_image'        =>      'required|mimes:png|max:10000', //10000kb
        ];
    }
}
