<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class TableUpdateRequest extends FormRequest
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
            'tables' => 'required|array',
            'tables.*' => 'required|array',
            'tables.*.coordinates' => 'required|json',
            'tables.*.size' => 'required|json',
            'tables.*.id' => 'required|integer',
            'tables.*.type' => 'required|string|max:100',
            'tables.*.name' => 'required|string|max:200',
            'tables.*.price' => 'required|integer|max:5000000',
        ];
    }
}
