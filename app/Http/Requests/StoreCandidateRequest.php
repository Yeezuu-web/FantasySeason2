<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'manager_name'  => [
                'required',
            ],
            'team_name'     => [
                'required'
            ],
            'dob'           => [
                'required'
            ], 
            'gender'        => [
                'required'
            ], 
            'fan_club'      => [
                'required'
            ], 
            'email'         => [
                'required',
                'unique:candidates'
            ], 
            'phone'         => [
                'required',
                Rule::unique('candidates')
                ->ignore($this->candidate)
                ->where(function($query) {
                    $query->where('status', '!=', '2');
                })
            ], 
            'bank'         => [
                'required',
            ], 
            'transaction'=> [
                'required',
            ], 
            'term'      => [
                'required',
            ]
        ];
    }
}
