<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Excel;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\CallLike;

use function PHPUnit\Framework\isNull;

class PDFController extends Controller
{
    public function pdf(Request $request, $id)
    {
        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.*', 'container_type.container_type')
            ->where('container_id', '=', $id)
            ->get();

        return view('pages.container-management.receipt-management.management.print', [
            'cstr_data' => $container

        ]);
    }
    public function export_agent(Request $request)
    {
        $date = $request->start;
        $data = $request->id_export;

        if ($data > 0) {
            if ($date > 0) {
                $container = DB::table('container')
                    ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                    ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                    ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                    ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                    ->where('container.enterprise_id', '=', $request->id_export)
                    ->where('container.manage_in_date','like', $date.'%')
                    ->get();

                $name = DB::table('enterprise')
                    ->select('enterprise_name')
                    ->where('enterprise_id', '=', $request->id_export)
                    ->get();


                $pdf = PDF::loadView('pages.container-management.export-container.export', ['name_agent' => $name, 'cntr' => $container]);
                return $pdf->download('export.pdf');
            } else {
                $container = DB::table('container')
                    ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                    ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                    ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                    ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                    ->where('container.enterprise_id', '=', $request->id_export)
                    ->get();

                $name = DB::table('enterprise')
                    ->select('enterprise_name')
                    ->where('enterprise_id', '=', $request->id_export)
                    ->get();


                $pdf = PDF::loadView('pages.container-management.export-container.export', ['name_agent' => $name, 'cntr' => $container]);
                return $pdf->download('export.pdf');
            }
        } else {
            return back()->withStatus(__("Can't Export fill, data is null!!!."));
        }
    }
    public function report_agent(Request $request)
    {
        $date = $request->start;
        $data = $request->id_export;

        if ($data > 0) {
            if ($date > 0) {
                $container = DB::table('container')
                    ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                    ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                    ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                    ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                    ->where('container.enterprise_id', '=', $request->id_export)
                    ->where('container.manage_in_date','like', $date.'%')
                    ->get();

                $name = DB::table('enterprise')
                    ->select('enterprise_name')
                    ->where('enterprise_id', '=', $request->id_export)
                    ->get();


                $pdf = PDF::loadView('pages.container-management.export-container.report', ['name_agent' => $name, 'cntr' => $container]);
                return $pdf->download('report.pdf');
            } else {
                $container = DB::table('container')
                    ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                    ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                    ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                    ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                    ->where('container.enterprise_id', '=', $request->id_export)
                    ->get();

                $name = DB::table('enterprise')
                    ->select('enterprise_name')
                    ->where('enterprise_id', '=', $request->id_export)
                    ->get();


                $pdf = PDF::loadView('pages.container-management.export-container.report', ['name_agent' => $name, 'cntr' => $container]);
                return $pdf->download('report.pdf');
            }
        } else {
            return back()->withStatus(__("Can't Export fill, data is null!!!."));
        }
    }
}
