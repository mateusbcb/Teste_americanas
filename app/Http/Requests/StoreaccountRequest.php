<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Account;

class StoreaccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $req = FormRequest::all();
        
        $valid = Account::where([
            [ 'email','=', $req['email'] ],
            [ 'password', '=', md5( $req['password'] ) ],
        ])
        ->first();
        
        if ($valid == null) {
            return false;
            // return redirect('/')->with('error', 'Usuário ou senha inválido!');
        }else {
            return true;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required',
            'password'  => 'required',
        ];
    }
}
