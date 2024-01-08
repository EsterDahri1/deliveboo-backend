<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;



use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::id()===1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'bail|required|string|max:50|min:2',
            // 'description' => 'bail|nullable|string|max:100|min:2',
            // 'price' => 'bail|required|min:2',
            // 'cover_image' => 'bail|nullable|mimes:jpg,bmp,png|max:300',
            // 'ingredients' => 'required|max:1000|min:2',
        ];
    }
}