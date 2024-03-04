<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
             'title'=>['sometimes','required','string','max:100'],
             'slug'=>['sometimes','required','unique:posts,slug','string'],
             'content'=>['sometimes','required','string'],
             'image'=>['sometimes','string','nullable'],
             'published'=>['sometimes','required',Rule::in([1,0])],
             'user_id'=>['sometimes','required', Rule::exists('users', 'id')],
             'category_id'=>['sometimes','required', Rule::exists('categories', 'id')],
             'tags'=>['sometimes',"array",Rule::exists('tags', 'id')],
        ];
    }
}
