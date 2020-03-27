<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:posts',
            'description' => 'required|min:10',
            'image' => 'image|mimes:png,jpeg,jpg',
            'user_id' => 'exists:users,id'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'title.required' => 'Title of post is required',
            'title.unique' => 'Title of post must be unique',
            'description.required'  => 'Description of post is required',
            'image.image' => 'file is not an image',
            'image.mimes' => 'Image extension is not png or jpg ',
            'title.min' => 'the length of title must be greater than 3',
            'description.min'  => 'the length of description must be greater than 10',
            'user_id.exists' =>'user doesn\'t exist'
        ];
    }
}
