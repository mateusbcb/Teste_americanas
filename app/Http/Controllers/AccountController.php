<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreaccountRequest;
use App\Http\Requests\UpdateaccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Account $account)
    {
        $password       = $request->password;
        $re_password    = $request->re_password;

        $exist = $account->where('email', '=', $request->email)->count();
        
        if ($exist > 0) {
            return redirect()->back()->with('error', 'Usuário já existe!');
        }

        if ($password != $re_password) {
            return redirect()->back()->withInput()->with('error', 'As duas senhas não são iguais!');
        }

        // pega o proximo id
        $nextId = $account->max('id') + 1;
        
        $data = $request->all();
        
        $data['avatar'] = $account->avatar;
        
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid() ) {
            
            $name = 'user-'.$nextId;

            $extension = $request->avatar->extension();

            $nameFile = "{$name}.{$extension}";

            $data['avatar'] =$nameFile;
            
            $upload = $request->avatar->storeAs('avatars', $nameFile);

            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao enviar Imagem!');
            }
        }else {
            $data['avatar'] = "user-0.svg";
        }

        $account->name      = $request->name;
        $account->email     = $request->email;
        $account->avatar    = $data['avatar'];
        $account->password  = md5($request->password);

        // sala o avatar na pasta
        /**Precisa ser feito */        
        
        $account->save();


        return redirect('/accounts')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreaccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaccountRequest $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        
        if ($request->validated()) {

            $user = Account::where([
                ['email', '=', $email],
                ['password', '=', $password],
            ])->first();

            $_SESSION['id'] = $user->id;
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
            
            return view('paginas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaccountRequest  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateaccountRequest $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        //
    }
}
