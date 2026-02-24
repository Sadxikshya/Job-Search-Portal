<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
    public function rules(): array
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
