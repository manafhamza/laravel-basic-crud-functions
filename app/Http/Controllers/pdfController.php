<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Family;
use App\models\Experience;
use PDF;
use DB;
class pdfController extends Controller
{

    public function export($id)
    {
        $data['employees'] = Employee::where(['id'=>$id])->get();
        $data['experience'] =  Experience::where(['empId' => $id])->get();
        $data['family'] =  Family::where(['empId' => $id])->get();
        $pdf = PDF::loadView('admin/exportpdf',$data);
        //$pdf->setPaper('A4', 'landscape');
        return $pdf->download('employees.pdf');
        return view('admin/exportpdf',$data);
    }
}
