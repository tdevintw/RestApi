<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
        $method = $this->method();

        if($method =='PUT'){
            return [
                'userId' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'status' => ['required'],
                'limitDate' => ['required'],
    
            ];
        }else{
            return [
                'userId' => ['sometimes','required'],
                'title' => ['sometimes','required'],
                'description' => ['sometimes','required'],
                'status' => ['sometimes','required'],
                'limitDate' => ['sometimes','required'],
    
            ];
        }

    }



    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'limit_date' => $this->limitDate,
        ]);
    }
}
