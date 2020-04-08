<?php

namespace App\Http\Requests\OrderService;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'requester' => 'required',
            'department' => 'required',
            'date' => 'nullable',
            'contact' => 'required',
            'reason' => 'required',
            'soluction' => 'required',
            'technician' => 'required|string|max:255',
            'date_resolution' => 'required|date',
            'status_service' => 'required'
        ];
    }
}
