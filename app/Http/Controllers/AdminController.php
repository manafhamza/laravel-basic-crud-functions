<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
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
        $data = DB::table('admin')->where(['id'=>$aid])->first();
        //var_dump($data);die;
        $result= array('username' => $data->userName , 'firstname'=>$data->firstName, 'lastname' =>$data->lastName, 'email' => $data->email);
         
         //dump($result);die;
        
       return view('/admin/dashboard',$result);
         

    }
    public function employees()
    {
        $result['employees'] = DB::table('employees')->get();
        // dump($result);die;
        return view('admin/employees',$result);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //dump($data);

        if(DB::table('employees')->insert($data))
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
        $result = DB::table('employees')->where(['id' => $id])->get();
        if($result)
        {
            $emp  = array();
            foreach ($result as $key => $value)
            // {
            //     $emp['id']= $value['id'];
            //     $emp['fname']= $value['$firstName']; 
            //     $emp['lname']= $value['lastName'];
            //     $emp['address']= $value['address'];
            //     $emp['username']= $value['userName']; 
            //     $emp['email']= $value['email'];
            //     $emp['gender']= $value['gender'];
            //     $emp['dob']= $value['birthDate'];
            //     $emp['doh']= $value['hireDate'];
            //     $emp['phone']= $value['phone']; 
            //     $emp['salary']= $value['salary'];
            //     $emp['created_at']= $value['created_at'];
            //     $emp['updated_at']= $value['updated_at'];
            // }
            ///$result = json_encode($result);
            //dump($result);

            //echo $id;
            //echo $result->firstName;
             
             // $employee= array('id'=>$id,'fname' => $firstName, 'lname'=>$lastName,'address'=>$address,'username'=>$userName, 'email'=>$email,'gender'=>$gender,'dob'=>birthDate,'doh'=>$hireDate,'phone'=>$phone, 'salary'=>$salary,'created_at'=>$created_at,'updated_at'=>$updated_at);
           
            // dump($experience);die;
             
            // $employee= array('id'=>$result->id,'fname' => $result->firstName, 'lname'=>$result->lastName,'address'=>$result->address,'username'=>$result->userName, 'email'=>$result->email,'gender'=>$result->gender,'dob'=>$result->birthDate,'doh'=>$result->hireDate,'phone'=>$result->phone, 'salary'=>$result->salary,'created_at'=>$result->created_at,'updated_at'=>$result->updated_at);
            // dump($employee);
 
            $experience =  DB::table('previous_experience')->where(['empId' => $id])->get();
            //dump($employee);
            //dump($experience);
            
            $family =  DB::table('family_members')->where(['empId' => $id])->get();
            $data = array('employee'=>$result,'experience'=>$experience,'family'=>$family);
           // dump($family);die;
            return view('admin/employeeProfile',$data);

            // $experience = array('experienceTitle'=>$result->experienceTitle,'years'=>$result->years,'months'=>$result->months,'employer'=>$result->employer );
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
        $result = DB::table('employees')->where(['id' => $id])->first();
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
        if(DB::table('employees')->where(['id'=> $request->id])->update($data))
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
        if(DB::table('employees')->where('id', $id)->delete())
        {
            return redirect('admin/employees')->with('success','Employee has been Deleted Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');

        }
    }
}
