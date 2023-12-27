<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'id'       => 'required|string|max:2|unique:languages,id,'.$this->id,
          'name'     => 'required|string|max:25',
          'active'   => 'nullable|boolean',
          'default'  => 'nullable|boolean',
          'fallback' => 'nullable|boolean',
        ];
    }
}
