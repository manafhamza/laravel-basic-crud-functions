<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Family;
use App\Models\Experience;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $eid = session()->get('eid');
        $data = Employee::where(['id'=>$eid])->first();
        $result= array('id'=>$data->id,'username' => $data->userName , 'firstname'=>$data->firstName, 'lastname' =>$data->lastName, 'email' => $data->email,'address'=>$data->address,'gender'=>$data->gender,'dob'=>$data->birthDate,'doh'=>$data->hireDate,'salary'=>$data->salary,'phone'=>$data->phone,'created_at'=>$data->created_at,'updated_at'=>$data->updated_at);
       return view('/employee/dashboard',$result);       
    }
    public function experience()
    {
       $eid = session()->get('eid');
       $data['experience'] = Experience::where(['empId'=>$eid])->orderBy('id', 'DESC')->get();
       return view('employee/experience',$data);       
    }
    public function family()
    {
       $eid = session()->get('eid');
       $data['family'] = Family::where(['empId'=>$eid])->orderBy('id', 'DESC')->get();
       return view('employee/family',$data);       
    }
    public function edit()
    {
       $eid = session()->get('eid');
        $data = Employee::where(['id'=>$eid])->first();
        $result= array('id'=>$data->id,'username' => $data->userName , 'firstname'=>$data->firstName, 'lastname' =>$data->lastName, 'email' => $data->email,'address'=>$data->address,'gender'=>$data->gender,'dob'=>$data->birthDate,'doh'=>$data->hireDate,'salary'=>$data->salary,'phone'=>$data->phone,'created_at'=>$data->created_at,'updated_at'=>$data->updated_at);
       return view('/employee/edit',$result);       
    }
    public function delete_experience($id)
    {
        $eid = session()->get('eid');
        $data = Experience::where(['id'=>$id,'empId'=>$eid])->first();
        if($data)
        {
            if(Experience::where(['id'=> $id,'empId'=>$eid])->delete())
            {
                return redirect('employee/experience')->with('success','Experience has been Deleted Successfully');
            }
            else
            {
                return redirect('employee/experience')->with('failed','System Error');
            }
        }
        else
        {
            return redirect('employee/experience')->with('failed','You can delete only Your Experience');
        }
    }
    public function delete_member($id)
    {
        $eid = session()->get('eid');
        $data = Family::where(['id'=>$id,'empId'=>$eid])->first();
        if($data)
        {
            if(Family::where(['id'=> $id,'empId'=>$eid])->delete())
            {
                return redirect('employee/family')->with('success','Family Member has been Deleted Successfully');
            }
            else
            {
                return redirect('employee/family')->with('failed','System Error');

            }
        }
        else
        {
            return redirect('employee/family')->with('failed','You can delete only Your Family Member');
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
        $eid = session()->get('eid');
        $date = Carbon::now();
         
        $data = array('firstName' => $request->fname, 'lastName'=>$request->lname,'birthDate'=>$request->dob,'address'=>$request->address,'phone'=>$request->phone,'updated_at'=>$date);
         
        if(Employee::where(['id'=> $eid])->update($data))
        {
            return redirect('employee/dashboard')->with('success','Details has been Updated Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');

        }

    }
    public function save_experience(Request $request)
    {
        $eid = session()->get('eid');
        $date = Carbon::now();
        $data = array('empId'=>$eid,'experienceTitle'=>$request->title,'employer'=>$request->employer,'years'=>$request->years,'months'=>$request->months,'created_at'=>$date);
        if(Experience::insert($data))
        {
            return redirect('employee/experience')->with('success','Experience has been Added Successfully');
        }
        else
        {
            return redirect()->back()->with('failed','System Error');

        }
    }
    public function save_member(Request $request)
    {
        $eid = session()->get('eid');
        $date = Carbon::now();
        $data = array('empId'=>$eid,'firstName'=>$request->firstname,'lastName'=>$request->lastname,'gender'=>$request->gender,'relation'=>$request->relation,'created_at'=>$date);
        if(Family::insert($data))
        {
            return redirect('employee/family')->with('success','Family Member has been Added Successfully');
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
    
}
