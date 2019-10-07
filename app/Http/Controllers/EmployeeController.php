<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Employee;
use App\Company;
use Lang;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::with('company')->paginate(10);
        //return $employees;
        return view('employees.index')->with(compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::get();
        //return $employees;
        return view('employees.create')->with(compact('companies'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'company_id' => 'required|exists:companies,id',
                'first_name' => 'required|max:455',
                'last_name' => 'required|max:455',
                'email'=> 'nullable|max:255|unique:companies,email|email',
                'phone'=> 'max:255',
            ]
        );
        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $company = Company::find($request->company_id);
        $employee->company()->associate($company);
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employees.index')->with('success_message', __('form.action_successful'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::with('company')->where('id',$id)->first();
        //return $employees;
        return view('employees.show')->with(compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $companies = Company::get();
        $employee = Employee::with('company')->where('id',$id)->first();
        //return $employees;
        return view('employees.edit')->with(compact(['employee','companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:employees',
                'company_id' => 'required|exists:companies,id',
                'first_name' => 'required|max:455',
                'last_name' => 'required|max:455',
                'email'=> 'nullable|email|max:255|unique:employees,email,'.$request->id,
                'phone'=> 'max:255',
            ]
        );
        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $employee = Employee::where('id',$request->id)->first();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $company = Company::find($request->company_id);
        $employee->company()->associate($company);
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        
        return redirect()->route('employees.index')->with('success_message', __('form.action_successful'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:employees',
            ]
        );
        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $employee = Employee::find($request->id);

        Employee::destroy($request->id);
        return redirect()->route('employees.index')->with('success_message', __('form.action_successful'));
    }
}
