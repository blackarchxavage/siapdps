<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
        //return true;
    }
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nrp_nip' => 'required',
            'nama' => 'required',
            'foto_file' => 'image|file|max:5000',
            'pangkat_file' => 'mimetypes:application/pdf|file|max:5000',
            'sumber_file' => 'mimetypes:application/pdf|file|max:5000',
            'kta_file' => 'mimetypes:application/pdf|file|max:5000'
        ];
    }
} 
