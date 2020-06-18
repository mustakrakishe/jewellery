<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'code' => 'required | max:30',
            'title' => 'required | max:50',
            'weight' => 'required | max:500',
            'cost' => 'required | max:500000',
            'description' => 'max:250',
            'pic' => 'image | dimensions: min_width=223, ratio=1'
        ];
    }

    public function messages(){
        return[
            'code.required' => 'Поле Артикул обязательно для заполнеия.',
            'code.max' => 'Поле Артикул должно включать не более 30 символов.',
            
            'title.required' => 'Поле Название обязательно для заполнеия.',
            'title.max' => 'Поле Название должно включать не более 50 символов.',
            
            'weight.required' => 'Поле Вес обязательно для заполнеия.',
            'weight.max' => 'Вес не должен превышать 500 г.',

            'cost.required' => 'Поле Цена обязательно для заполнеия.',
            'cost.max' => 'Цена не должна превышать 500 000 грн..',
            
            'description.max' => 'Поле Описание может включать не более 250 символов.',

            'pic.image' => 'Файл Изображение должен иметь расширение изображения (jpeg, png, bmp, gif, svg или webp).',
            'pic.size' => 'Файл Изображение должен иметь вес не более 50 000 байт.',
            'pic.dimensions' => 'Файл Изображение должен иметь пропорции 1:1 и размер не менее 233x233 пикселей.',
        ];
    }
}
