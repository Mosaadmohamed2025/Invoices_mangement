<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Product_name' => 'required|unique:products|max:255',
            'section_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Product_name.required' =>'يرجى إدخال اسم المنتج',
            'Product_name.unique' =>'اسم المنتج مسجل مسبقاً',
            'section_id.required' =>'يرجى اختيار القسم',
        ];
    }
}
