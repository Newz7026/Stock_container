<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Agent;
use App\Models\Container_grade;
use App\Models\Container_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;





class ContainerController extends Controller
{
    public function receipt_manage(Request $request)
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $container_data = Container::orderby('enterprise_id', 'asc')->get();
        $type_data = Container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = Container_grade::orderby('container_grade_id', 'asc')->get();

        if ($request->agent_search != '' && $request->type_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.*')
                ->where('container.enterprise_id', '=', $request->agent_search)
                ->where('container.container_type_id', '=', $request->type_search)
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } elseif ($request->type_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.*')
                ->where('container.container_type_id', '=', $request->type_search)
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } elseif ($request->agent_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.*')
                ->where('container.enterprise_id', '=', $request->agent_search)
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } else {
            $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type','container_type.price','container_type.lifting')
            ->orderBy('container_type_id','asc')
            ->get();
        }
        return view('pages.container-management.receipt-management.index', [
            'container_data' => $container_data,
            'type_data' => $type_data,
            'grade_data' => $grade_data,
            'agent_data' => $agent_data,
            'in_data' => $container
        ]);
    }
    public function print()
    {
        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->where('container_id', '=', '$request=>$id')
            ->get();
        return view('pages.container-management.receipt-management.management.print', [
            'cstr_data' => $container
        ]);
    }
    public function record_manage()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $container_data = Container::orderby('enterprise_id', 'asc')->get();
        $type_data = Container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = Container_grade::orderby('container_grade_id', 'asc')->get();

        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->where('container_in_out', '=', '1')
            ->orderBy('enterprise_id','asc')
            ->get();
        return view('pages.container-management.record-management.index', [
            'container_data' => $container_data,
            'type_data' => $type_data,
            'grade_data' => $grade_data,
            'agent_data' => $agent_data,
            'in_data' => $container
        ]);
    }
}
