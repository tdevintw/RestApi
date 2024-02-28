<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
    public function rules()
    {
        return [
            'userId' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'limitDate' => ['required'],

        ];
    }



    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'limit_date' => $this->limitDate,
        ]);
    }
}
