<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function pdf(Request $id)
    {
        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->where('container_id', '=', $id)
            ->get();

        return view('pages.container-management.receipt-management.management.print', [
            'cstr_data' => $container

        ]);
    }
    public function export_agent(Request $request)
    {
        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->where('container.enterprise_id', '=', $request->id_export)
            ->get();

        $name = DB::table('enterprise')
            ->select('enterprise_name')
            ->where('enterprise_id','=',$request->id_export)
            ->get();

        $pdf = PDF::loadView('pages.container-management.export-container.export', ['cntr' => $container, 'name_agent' => $name]);
        return $pdf->download('export.pdf');
    }
}
