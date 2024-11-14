<?php

namespace Modules\Brand\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'name'=>'required|unique:brand_translations',
                'slug'=>'required|unique:brands',
                'image'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'name'=>'required',
                    'slug'=> 'required|unique:brands,slug,'.$this->brand.',id',
                ];
            }else{
                $rules = [
                    'name'=>'required',
                ];
            }

        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('translate.Name is required'),
            'name.unique' => trans('translate.Name already exist'),
            'slug.required' => trans('translate.Slug is required'),
            'image.required' => trans('translate.Image is required'),
            'slug.unique' => trans('translate.Slug already exist'),
        ];
    }
}
