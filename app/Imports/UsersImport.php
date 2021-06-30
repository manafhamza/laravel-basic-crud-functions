<?php

namespace App\Imports;

use App\models\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     
    public function model(array $row)
    {
 
        return new Employee([
            
             'firstName' =>  $row['firstname'],
            'lastName' =>  $row['lastname'],
            'userName' =>  $row['username'],
            'password' => Hash::make($row['password']),
            'address' =>  $row['address'],
            'email' =>  $row['email'],
            'gender' =>  $row['gender'],
            'birthDate'=>$row['birthdate'],
            'hireDate'=>$row['hiredate'],
            'salary' =>  $row['salary'],
            'phone' =>  $row['phone'],
            'created_at' =>  Carbon::now(),
            'updated_at' =>  NULL,
            
        ]);
      
    }
}
