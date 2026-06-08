<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest {

    public function authorize() { return true; }

    protected function prepareForValidation() {
        $input = $this->all();
        array_walk($input, function (&$val) {
            if (is_string($val)) $val = trim(strip_tags($val));
        });
        $this->merge($input);
    }

    public function rules() {
        return [
            'name'        => 'sometimes|string|max:255',
            'quantity'    => 'sometimes|integer|min:0',
            'price'       => 'sometimes|numeric|min:0',
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}