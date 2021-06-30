<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Family;
use App\Models\Experience;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aid = session()->get('aid');
        $data = Admin::where(['id'=>$aid])->first();
        $result= array('username' => $data->userName , 'firstname'=>$data->firstName, 'lastname' =>$data->lastName, 'email' => $data->email);
        return view('/admin/dashboard',$result);
    }
    public function employees()
    {
        $result['employees'] = Employee::all();
        
        return view('admin/employees',$result);
    }
    public function export()
    {
        $result['employees'] = Employee::all();
        return view('admin/export',$result);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname =  $request->fname;
        $lname =  $request->lname;
        $address =  $request->address;
        $username =  $request->username;
        $password =  $request->password;
        $email =  $request->email;
        $gender =  $request->gender;
        $dob =  $request->dob;
        $doh =  $request->doh;
        $phone =  $request->phone;
        $salary =  $request->salary;
        $date = Carbon::now();
        $data = array('firstName' => $fname , 'lastName' =>$lname, 'address'=>$address, 'userName'=>$username,'password'=>$password,'email'=>$email,'gender'=>$gender,'birthDate'=>$dob,'hireDate'=>$doh,'phone'=>$phone,'salary'=>$salary, 'created_at'=>$date);
        if(Employee::insert($data))
        {
            return redirect('admin/employees')->with('success','Employee has been Added Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $result = DB::table('employees')->where(['id' => $id])->get();
        $result = Employee::where(['id' => $id])->get();
        if($result)
        {
            $data['employees'] = Employee::where(['id'=>$id])->get();
            $data['experience'] =  Experience::where(['empId' => $id])->get();
            $data['family'] =  Family::where(['empId' => $id])->get();
            return view('admin/employeeProfile',$data);
        }
        else
        {
            return redirect('admin/employees')->with('failed','Invalid Employee Selected');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Employee::where(['id' => $id])->first();
        if($result)
        {
        $employee= array('id'=>$result->id,'fname' => $result->firstName, 'lname'=>$result->lastName,'address'=>$result->address,'username'=>$result->userName, 'email'=>$result->email,'gender'=>$result->gender,'dob'=>$result->birthDate,'doh'=>$result->hireDate,'phone'=>$result->phone, 'salary'=>$result->salary );
        return view('admin/editemployee', $employee); 
        }
        else
        {
            return redirect()->back()->with('failed','Invalid Employee');
        }
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
        
        $fname =  $request->fname;
        $lname =  $request->lname;
        $address =  $request->address;
        $username =  $request->username;
        $password =  $request->password;
        $email =  $request->email;
        $gender =  $request->gender;
        $dob =  $request->dob;
        $doh =  $request->doh;
        $phone =  $request->phone;
        $salary =  $request->salary;
        $date = Carbon::now();
        $data = array('firstName' => $fname , 'lastName' =>$lname, 'address'=>$address, 'userName'=>$username,'email'=>$email,'gender'=>$gender,'birthDate'=>$dob,'hireDate'=>$doh,'phone'=>$phone,'salary'=>$salary, 'updated_at'=>$date);
        if(Employee::where(['id'=> $request->id])->update($data))
        {
            return redirect('admin/employees')->with('success','Employee has been Updated Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Employee::where('id', $id)->delete())
        {
            return redirect('admin/employees')->with('success','Employee has been Deleted Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');

        }
    }
    public function upload_file(Request $request)
    {
        $file = $request->file('fileinput');
        if($file)
        {
            $file_name='users.xlsx';
            $path =public_path().'/'.$file_name;
            if(file_exists( $path))
            {
                unlink($path);
            }
            $file->move(public_path(), $file_name);
        }
        Excel::import(new UsersImport, 'users.xlsx');
        return redirect('admin/employees')->with('success', 'The Employees has been Added Successfully');

    }
}
