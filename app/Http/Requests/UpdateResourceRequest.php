<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResourceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:resources,id',
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'nullable|string',
            'published_in' => 'nullable|string|max:256',
            'year' => 'nullable|string|max:10',
            'category_id' => 'required|exists:categories,id',
            'language' => 'required|string|in:ru,tj,en',
            'is_public' => 'required|boolean',
            'file' => 'nullable|file|max:1200000',
            'type' => 'required|int',
        ];
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
}
