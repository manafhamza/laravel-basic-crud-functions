<?php

namespace App\Exports;

use App\Models\Employee;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {	


        return DB::table('employees')->select('id','firstName','lastName','userName','address','email',(DB::raw("CASE WHEN gender = 0 THEN 'Female' ELSE 'Male' END")),'birthDate','hireDate','salary','phone','created_at','updated_at')->get();
    }
    public function headings(): array
    {
        return [
            'Employee ID',
            'First Name',
            'Last Name',
            'UserName',
            'Address',
            'Email',
            'Gender',
            'Date of Birth',
            'Date of Hiring',
            'Salary',
            'Phone',
            'Created On',
            'Updated On',
             
        ];
    }
}
