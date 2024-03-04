<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
             'title'=>['required','string','max:100'],
             'slug'=>['required','unique:posts,slug','string'],
             'content'=>['required','string'],
             'image'=>['string','nullable'],
             'published'=>['required',Rule::in([1,0])],
             'user_id'=>['required', Rule::exists('users', 'id')],
             'category_id'=>['required', Rule::exists('categories', 'id')],
             'tags'=>["array",Rule::exists('tags', 'id')],
        ];
    }
}
