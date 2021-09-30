<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Agent;
use App\Models\container_grade;
use App\Models\container_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;





class ContainerController extends Controller
{
    public function receipt_manage()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $type_data = container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = container_grade::orderby('container_grade_id', 'asc')->get();

        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->orderBy('container_type_id','asc')
            ->get();

        // $date_1 = $container->manage_in_date;
        // $date_2 = $container->manage_out_date;
        // $first_datetime = Carbon::parse($date_1);
        // $last_datetime = Carbon::parse($date_2);
        // $interval = $first_datetime->diff($last_datetime);
        // $final_days = $interval->d;

        return view('pages.container-management.receipt-management.index', [
            'type_data' => $type_data,
            'grade_data' => $grade_data,
            'agent_data' => $agent_data,
            'in_data' => $container,
            // 'long_stay' => $final_days
        ]);
    }

    public function print(Request $request, $id)
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
        $type_data = container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = container_grade::orderby('container_grade_id', 'asc')->get();

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
