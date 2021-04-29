<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployee;
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
        return view('employee.index',[
            'employees' => Employee::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create', [
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        try {
            $employee = Employee::create($request->all());
            $company = Company::findOrFail($request->company);
            $employee->company()->associate($company);
            $employee->save();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage())->withInput();   
        }
        
        return redirect()->route('employees.index')->with('status', 'Employee created sucessfully.');   
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show',[
            'employee' => Employee::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit',[
            'employee' => Employee::findOrFail($id),
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->all());
            $company = Company::findOrFail($request->company);
            $employee->company()->associate($company);
            $employee->save();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage())->withInput();   
        }

        return redirect()->route('employees.show',[
            'employee' => $employee->id
        ])->with('status', 'Employee updated sucessfully.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $flight = Employee::findOrFail($id);
            $flight->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage());   
        }
        return redirect()->route('employees.index')->with('status', 'Employee deleted sucessfully.');   
    }
}
