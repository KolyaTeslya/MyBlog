<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строному типу',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}
