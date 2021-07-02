<?php

namespace App\Imports;

use DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\models\Employee;


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
  
 //date('Y-m-d',\PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['birthdate']))
        return new Employee([
            
             // 'firstName' =>  'firstname',
             'firstName' =>  $row['firstname'],
            'lastName' =>  $row['lastname'],
            'userName' =>  $row['username'],
            'password' => Hash::make($row['password']),
            'address' =>  $row['address'],
            'email' =>  $row['email'],
            'gender' =>  $row['gender'],
            'birthDate'=>date('Y-m-d', $row['birthdate']),
            // 'birthDate'=>date('Y-m-d', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['birthdate'])),
            'hireDate'=> date('Y-m-d', $row['hiredate']),
            // 'hireDate'=> date('Y-m-d', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($row['hiredate'])),
            'salary' =>  $row['salary'],
            'phone' =>  $row['phone'],
            'created_at' =>  Carbon::now(),
            'updated_at' =>  NULL,
            
        ]);
      
    }
}
