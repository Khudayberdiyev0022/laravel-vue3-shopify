<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslationRequest extends FormRequest
{

  public function authorize(): bool
  {
    return true;
  }

  protected function prepareForValidation(): void
  {
    $this->merge([
      'text' => array_filter((array) $this->input('text')),
    ]);
  }

  public function rules(): array
  {
    return [
      'group'  => 'required|string|max:50',
      'key'    => 'required|string|max:50',
      'text'   => "required|array|max:5",
      'text.*' => 'required|string|max:1000',
    ];
  }
}
