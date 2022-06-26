<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'content' => 'required|max:200',
            'action_date' => 'required|date'
        ];
    }
    public function content(): string
    {
        return $this->input('content');
    }

    public function title(): string
    {
        return $this->input('title');
    }

    public function action_date(): string
    {
        return $this->input('action_date');
    }



}
