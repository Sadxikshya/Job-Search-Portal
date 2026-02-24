<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'salary' => 'required|numeric',
            'description' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'education' => 'required|string|in:high-school,diploma,bachelor,master,phd',
            'experience_level' => 'required|in:Entry Level,Mid Level,Senior Level,Lead/Manager',
        ];
    }
}