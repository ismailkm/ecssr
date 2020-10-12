<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestStoreRequest extends FormRequest
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
          'results.*.question_id' => 'required|exists:questions,id',
          'results.*.category_id' => 'required|exists:categories,id',
          'results.*.answer' => 'required',
        ];
    }

    public function all($keys = null)
    {
        $student = auth('api')->setToken(auth('api')->getToken())->user();
        $data = parent::all();
        $data['student'] = $student['id'];
        return $data;
    }

    protected function failedValidation(Validator $validator)
    {
      foreach($validator->errors()->toArray() as $err)
      throw new HttpResponseException(response()->error($err[0], 422));
    }
}
