<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Employee;
use DB;


class LoginController extends Controller
{
    public function employee(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $employee = Employee::where(['userName'=>$username])->first();
        if($employee)
        {
            if(password_verify($password,$employee->password))
            {
                $request->session()->put(['eid'=>$employee->id]);
                return redirect('employee/dashboard'); 
            }
            else
            {
                 return redirect()->back()->with('failed','Username and Password Does not Match');
            }
        }
        else
        {
                 return redirect()->back()->with('failed','Invalid User');
        }
    }
    public function admin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $admin = Admin::where(['userName'=>$username])->first();
        if($admin)
        {
        	if(password_verify($password,$admin->password))
        	{
        		$request->session()->put(['aid'=>$admin->id]);
				return redirect('admin/dashboard'); 
        	}
        	else
        	{
                 return redirect()->back()->with('failed','Username and Password Does not Match');
        	}
        }
        else
        {
                 return redirect()->back()->with('failed','Invalid User');
        }
    }
}
