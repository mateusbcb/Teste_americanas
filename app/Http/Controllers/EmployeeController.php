<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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

        $employees = Employee::orderBy('updated_at', 'desc')->paginate(10);

        return view('paginas.employees',[
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee  $employee, Request $request)
    {
        $exist = $employee->where('nome', '=', $request->nome)->count();
        
        if ($exist > 0) {
            return redirect()->back()->with('error', 'Empregado já existe!');
        }

        $employee->nome      = $request->nome;
        $employee->sobrenome  = $request->sobrenome;
        $employee->prontuario  = $request->prontuario;
        $employee->empresa   = $request->empresa;
        $employee->email   = $request->email;
        $employee->telefone   = $request->telefone;

        $employee->save();

        return redirect('/employees')->with('success', 'Empregado criado com sucesso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
    }

    /**
     * DELETE
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        if( !($_SESSION) || !(isset($_SESSION['email'])) ) {
            return redirect('/accounts');
            exit();
        }

        $employee = Employee::where('id', '=', $employee->id);

        $employee->delete();

        return redirect()->back()->with('success', 'Empregado deletado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
