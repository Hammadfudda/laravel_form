<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name'        => 'required|string|max:255',
            'delivery_address'    => 'required|string',
            'telephone'           => 'required|string|max:20',
            'contact_name'        => 'required|string|max:255',
            'contact_email'       => 'required|email|max:255',

            'special_instructions'=> 'nullable|string',
            'invoicing_address'   => 'nullable|string',
            'accounts_contact'    => 'nullable|string|max:255',
            'accounts_email'      => 'nullable|email|max:255',
            'accounts_telephone'  => 'nullable|string|max:20',
            'invoice_email'       => 'nullable|email|max:255',

            'po_required'         => 'required|in:Yes,No',
            'source'              => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required'      => 'Company name is required',
            'delivery_address.required'  => 'Delivery address is required',
            'telephone.required'         => 'Telephone number is required',
            'contact_name.required'      => 'Contact name is required',
            'contact_email.required'     => 'Contact email is required',
            'contact_email.email'        => 'Enter a valid contact email',

            'accounts_email.email'       => 'Enter a valid accounts email',
            'invoice_email.email'        => 'Enter a valid invoice email',

            'po_required.required'       => 'Please select if purchase order is required',
            'source.required'            => 'Please select how you heard about us',
        ];
    }
}
