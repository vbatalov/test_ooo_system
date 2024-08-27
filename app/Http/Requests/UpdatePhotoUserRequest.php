<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "image" => [
                "required", "image"
            ]
        ];
    }
}
