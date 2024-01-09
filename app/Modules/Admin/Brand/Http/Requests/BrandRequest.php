<?php

namespace App\Modules\Admin\Brand\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @BrandRequest
 */
class BrandRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'bail',
                // Required if there is no status transmitted
                Rule::requiredIf(fn () => empty($this->status)),
                // Ignore if there is a model transmitted and not deleted
                Rule::unique('brands')->ignore($this->route('brand'))->whereNull('deleted_at'),

            ],

            'avatar' => [
                'bail',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
                // Required if there is no model transmitted
                Rule::requiredIf(fn () => !$this->route('brand'))
            ],
        ];
    }
}
