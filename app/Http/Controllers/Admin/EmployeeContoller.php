<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::with("user")->latest()->get();

        return view("admin.employees.index", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|unique:users,email",
            "password"=>"required|min:8",
        ]);

        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
        ]);

        $user->assignRole("employee");

        Employee::create([
            "user_id"=>$user->id
        ]);

        return redirect()->route("admin.employees.index")->withToastSuccess('Successfully Created');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=Employee::with("user")->findOrFail($id);


        return view("admin.employees.edit",compact("employee"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employee::findOrFail($id);

        $request->validate([
            "name"=>"required",
            "email"=>"required|unique:users,email,".$employee->user->id,
            "password"=>"nullable|min:8",
        ]);

        $dataToUpdate=[
            "name"=>$request->name,
            "email"=>$request->email,
        ];

        if($request->password){
            $dataToUpdate["password"]=bcrypt($request->password);
        }

        $employee->user->update($dataToUpdate);

        return redirect()->route("admin.employees.index")->withToastSuccess('Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee= Employee::findorfail($id);

        $user=$employee->user;

        $employee->delete();
        $user->delete();

        return redirect()->route("admin.employees.index")->withToastSuccess('Successfully Deleted');

    }
}
