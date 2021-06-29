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

        //check for the username
        $employee = DB::table('employees')->where(['userName'=>$username])->first();
        // dump($employee); 
        if($employee)
        {
            // if username exists.

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
            // if username does not exists.
                 return redirect()->back()->with('failed','Invalid User');
             
        }
    }
    public function admin(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        
        //check for the username
        $admin = DB::table('admin')->where(['userName'=>$username])->first();
        if($admin)
        {
        	// if username exists.

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
        	// if username does not exists.
                 return redirect()->back()->with('failed','Invalid User');
        	 
        }
        
        
    }


}
