<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceCenterRequest extends FormRequest
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
            'region_id'     => 'required',
            'location'      => 'required|max:250',
            'address'       => 'required|max:250',
            'office_hours'  => 'required',
            'map_link'      => 'required|max:500',
        ];
    }
}
