<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
                'unique:candidates'
            ], 
            'bank'         => [
                'required',
            ], 
            'account_name'         => [
                'required',
            ], 
            'account_no'         => [
                'required',
            ], 
            'ref_id'         => [
                'required',
                'unique:candidates'
            ], 
            'transaction'=> [
                'required',
            ], 
        ];
    }
}
