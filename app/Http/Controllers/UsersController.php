<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UsersController extends Controller 
{
    public function export() 
    {

         return Excel::download(new UsersExport, 'users.xlsx');

    }
     public function import() 
    {
        Excel::import(new UsersImport, 'users.xlsx');
        
        return redirect('admin/employees')->with('success', 'The Employees has been Added Successfully');
    }
}