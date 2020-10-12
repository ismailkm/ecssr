<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
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
        'title' => 'required',
        'category_id' => 'required',
        'answer_1' => 'required',
        'answer_2' => 'required',
        'answer_3' => 'required',
        'answer_4' => 'required',
        'correct_answer' => 'required',
      ];
    }

    public function messages()
    {
        return [
            'correct_answer.required' => 'Atleast one answer should be a correct answer.',
        ];
    }
}
