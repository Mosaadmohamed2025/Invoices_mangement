<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_number' => 'required|unique:invoices',
            'invoice_Date' => 'required|date',
            'Due_date' => 'required|date',
            'product' => 'required',
            'Section' => 'required',
            'Amount_collection' => 'required|numeric',
            'Amount_Commission' => 'required|numeric',
            'Discount' => 'numeric',
            'Value_VAT' => 'required',
            'Rate_VAT' => 'required',
            'Total' => 'required',
            'note' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'invoice_number.required' =>'يرجى إدخال رقم الفاتورة',
            'invoice_number.unique' =>'رقم الفاتورة مسجل مسبقاً',
            'invoice_Date.required' =>'يرجى إدخال تاريخ الفاتورة',
            'invoice_Date.date' =>'تاريخ الفاتورة يجب أن يكون تاريخاً صالحاً',
            'Due_date.required' =>'يرجى إدخال تاريخ الاستحقاق',
            'Due_date.date' =>'تاريخ الاستحقاق يجب أن يكون تاريخاً صالحاً',
            'product.required' =>'يرجى إدخال المنتج',
            'Section.required' =>'يرجى اختيار القسم',
            'Amount_collection.required' =>'يرجى إدخال مبلغ التحصيل',
            'Amount_collection.numeric' =>'مبلغ التحصيل يجب أن يكون رقماً',
            'Amount_Commission.required' =>'يرجى إدخال مبلغ العمولة',
            'Amount_Commission.numeric' =>'مبلغ العمولة يجب أن يكون رقماً',
            'Discount.numeric' =>'الخصم يجب أن يكون رقماً',
            'Value_VAT.required' =>'يرجى إدخال قيمة ضريبة القيمة المضافة',
            'Value_VAT.numeric' =>'قيمة ضريبة القيمة المضافة يجب أن تكون رقماً',
            'Rate_VAT.required' =>'يرجى إدخال نسبة ضريبة القيمة المضافة',
            'Rate_VAT.numeric' =>'نسبة ضريبة القيمة المضافة يجب أن تكون رقماً',
            'Total.required' =>'يرجى إدخال الإجمالي',
            'Total.numeric' =>'الإجمالي يجب أن يكون رقماً',
        ];
    }
}
