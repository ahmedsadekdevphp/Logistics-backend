<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:100',
            'weight' => 'required|numeric|min:0',
            'pickupTime' => 'required|date|after_or_equal:today',
            'deliveryTime' => 'required|date|after:pickupTime'
        ];
    }

    public function messages(): array
    {
        return [
            'location.required' => trans('order.location.required'),
            'location.string' => trans('order.location.string'),
            'location.max' => trans('order.location.max'),

            'size.required' => trans('order.size.required'),
            'size.string' => trans('order.size.string'),
            'size.max' => trans('order.size.max'),

            'weight.required' => trans('order.weight.required'),
            'weight.numeric' => trans('order.weight.numeric'),
            'weight.min' => trans('order.weight.min'),

            'pickupTime.required' => trans('order.pickupTime.required'),
            'pickupTime.date_format' => trans('order.pickupTime.date_format'),
            'pickupTime.after_or_equal' => trans('order.pickupTime.after_or_equal'),

            'deliveryTime.required' => trans('order.deliveryTime.required'),
            'deliveryTime.date_format' => trans('order.deliveryTime.date_format'),
            'deliveryTime.after' => trans('order.deliveryTime.after'),
        ];
    }
}
