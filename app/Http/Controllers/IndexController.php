<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Index;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }

        return view('paginas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    public function companies_create()
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }

        return view('paginas.companies_create');
    }

    public function companies_create_new(Request $request, Company $company)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }

        $exist = $company->where('nome', '=', $request->nome)->count();
        
        if ($exist > 0) {
            return redirect()->back()->with('error', 'A empresa já existe!');
        }

        // pega o proximo id
        $nextId = $company->max('id') + 1;
        
        $data = $request->all();
        
        $data['logotipo'] = $company->logotipo;
        
        if ($request->hasFile('logotipo') && $request->file('logotipo')->isValid() ) {
            
            $name = 'user-'.$nextId;

            $extension = $request->logotipo->extension();

            $nameFile = "{$name}.{$extension}";

            $data['logotipo'] =$nameFile;
            
            $upload = $request->logotipo->storeAs('logotipos', $nameFile);

            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao enviar Imagem!');
            }
        }else {
            $data['logotipo'] = "user-0.svg";
        }

        $company->nome      = $request->nome;
        $company->endereco  = $request->endereco;
        $company->logotipo  = $data['logotipo'];
        $company->website   = $request->website;

        $company->save();

        return redirect('/companies')->with('success', 'Empresa criada com sucesso');
    }

    public function companies_edit($id, Company $company)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }
        
        $company = $company->where('id', '=', $id)->first();
        
        return view('paginas.companies_edit', [
            'company' => $company,
        ]);
    }

    public function companies_update($id, Company $company, request $request)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }
        
        $company = $company->where('id', '=', $id)->first();

        $data = $request->all();
        
        $data['logotipo'] = $company->logotipo;
        
        if ($request->hasFile('logotipo') && $request->file('logotipo')->isValid() ) {
            
            $name = 'user-'.$id;

            $extension = $request->logotipo->extension();

            $nameFile = "{$name}.{$extension}";

            $data['logotipo'] =$nameFile;
            
            $upload = $request->logotipo->storeAs('logotipos', $nameFile);

            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao enviar Imagem!');
            }
        }else {
            $data['logotipo'] = "user-0.svg";
        }
        
        $company->nome  = $request->nome;
        $company->endereco  = $request->endereco;
        $company->logotipo  = $data['logotipo'];
        $company->website  = $request->website;

        $company->update();

        return redirect('/companies')->with('success', 'Empresa editada com sucesso!');
    }

    /**
     *  =====================================
    */

    public function employees_create()
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }

        return view('paginas.employees_create');
    }

    public function employees_edit($id, Employee $employees)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }
        
        $employees = $employees->where('id', '=', $id)->first();
        
        return view('paginas.employees_edit', [
            'employees' => $employees,
        ]);
    }

    public function employees_update($id, Employee $employee, request $request)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }
        
        $employee = $employee->where('id', '=', $id)->first();
        
        $employee->nome  = $request->nome;
        $employee->sobrenome  = $request->sobrenome;
        $employee->prontuario  = $request->prontuario;
        $employee->empresa  = $request->empresa;
        $employee->email  = $request->email;
        $employee->telefone  = $request->telefone;

        $employee->update();

        return redirect('/employees')->with('success', 'Empregado editado com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        return redirect('/accounts');
    }
}
