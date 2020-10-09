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
        $rules = [
            'code' => 'required | max:30',
            'title' => 'required | max:50',
            'weight' => 'required | numeric | min:0.01 | max:500',
            'cost' => 'required | numeric | between:1, 500000',
            'description' => 'max:250',
            'pic' => 'image | dimensions: min_width=223, ratio=1'
        ];
        
        if(isset($_POST['newType'])){
            $rules['type'] = 'max:10';
        }

        return $rules;
    }

    public function messages(){
        $messages = [
            'code.required' => 'Поле Артикул обязательно для заполнеия.',
            'code.max' => 'Не более 30 символов.',
            
            'title.required' => 'Поле Название обязательно для заполнеия.',
            'title.max' => 'Не более 50 символов.',
            
            'weight.required' => 'Поле Вес обязательно для заполнеия.',
            'weight.min' => 'От 0,01 до 500 г.',
            'weight.max' => 'От 0,01 до 500 г.',

            'cost.required' => 'Поле Цена обязательно для заполнеия.',
            'cost.between' => 'От 1 до 500 000 грн..',
            
            'description.max' => 'Не более 250 символов.',

            'pic.image' => 'Только расширения jpeg, png, bmp, gif, svg или webp.',
            'pic.size' => 'Не более 50 000 байт.',
            'pic.dimensions' => 'Требуются пропорции 1:1 и размер не менее 233x233 пикселей.',
        ];
        
        if(isset($_POST['newType'])){
            $messages['type.max'] = 'Не более 10 символов.';
        }

        return $messages;
    }
}
