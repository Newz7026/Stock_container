<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Agent;
use App\Models\container_grade;
use App\Models\container_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class ManagementINController extends Controller
{
    public function gate_in()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $type_data = container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = container_grade::orderby('container_grade_id', 'asc')->get();
        return view('pages.container-management.gate-in-management.index', [
            'type_data' => $type_data,
            'grade_data' => $grade_data,
            'agent_data' => $agent_data
        ]);
    }


    // public function container_manage()
    // {
    //     $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
    //     $container_data = Container::orderby('enterprise_id', 'asc')->get();
    //     $type_data = container_type::orderby('container_type_id', 'asc')->get();
    //     $grade_data = container_grade::orderby('container_grade_id', 'asc')->get();
    //     $container = DB::table('container')
    //         ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
    //         ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
    //         ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
    //         ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
    //         ->where('container_in_out', '=', '0')
    //         ->orderBy('manage_in_date', 'desc')
    //         ->get();

    //     return view('pages.container-management.stock-container-management.index', [
    //         'container_data' => $container_data,
    //         'type_data' => $type_data,
    //         'grade_data' => $grade_data,
    //         'agent_data' => $agent_data,
    //         'in_data' => $container
    //     ]);
    // }
    public function container_manage(Request $request)
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $container_data = Container::orderby('enterprise_id', 'asc')->get();
        $type_data = container_type::orderby('container_type_id', 'asc')->get();
        $grade_data = container_grade::orderby('container_grade_id', 'asc')->get();

        if ($request->agent_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                ->where('container_in_out', '=', '0')
                ->where('container.enterprise_id', '=', $request->agent_search)
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } elseif ($request->type_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                ->where('container_in_out', '=', '0')
                ->where('container.container_type_id', '=', $request->agent_search)
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } elseif ($request->type_search != '' || $request->agent_search != '') {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                ->where('container_in_out', '=', '0')
                ->orderBy('manage_in_date', 'desc')
                ->get();
        } else {
            $container = DB::table('container')
                ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
                ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
                ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
                ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
                ->where('container_in_out', '=', '0')
                ->orderBy('manage_in_date', 'desc')
                ->get();
        }
        return view('pages.container-management.stock-container-management.index', [
            'container_data' => $container_data,
            'type_data' => $type_data,
            'grade_data' => $grade_data,
            'agent_data' => $agent_data,
            'in_data' => $container
        ]);
    }

    public function insert_container(Request $request)
    {

        if ($request->container_no == "" or $request->container_type_id  == "") {
            return back()->withStatus(__('Container Or Size is null'));
        } elseif ($request->container_grade_id == "" or $request->enterprise_id  == "") {
            return back()->withStatus(__('Grade or Agent is null.'));
        } elseif ($request->date == "" or $request->dri_in_name  == "") {
            return back()->withStatus(__('Date or Dirver name is null.'));
        } elseif ($request->dri_in_tel == "" or $request->dri_in_prise  == "") {
            return back()->withStatus(__('tel or enterprise is null.'));
        } else {
            DB::table('container')->insert([
                [
                    'container_number' => $request->container_no,
                    'container_type_id' => $request->container_type_id,
                    'container_grade_id' => $request->container_grade_id,
                    'enterprise_id' => $request->enterprise_id,
                    'status' => $request->remark,
                    'manage_in_date' => $request->date,
                    'manage_in_driver_name' => $request->dri_in_name,
                    'manage_in_driver_tel' => $request->dri_in_tel,
                    'manage_in_car_registration' => $request->dri_in_regis,
                    'manage_in_driver_enterprise' => $request->dri_in_prise,
                    'created_at' => now()
                ]
            ]);
            return back()->withStatus(__('Container insert successfully.'));
        }
    }

    public function update_container(Request $request)
    {
        if ($request->update_no == "" or $request->update_type  == "") {
            return back()->withStatus(__('can not update container!!!!!!!'));
        } elseif ($request->update_grade == "" or $request->update_agent  == "") {
            return back()->withStatus(__('can not update container!!!!!!!'));
        } elseif ($request->update_status == "" or $request->update_date  == "") {
            return back()->withStatus(__('can not update container!!!!!!!'));
        } elseif ($request->update_name == "" or $request->update_tel  == "") {
            return back()->withStatus(__('can not update container!!!!!!!'));
        } elseif ($request->update_car == "" or $request->update_prise  == "") {
            return back()->withStatus(__('can not update container!!!!!!!'));
        } else {
            DB::table('container')
                ->where('container_id', $request->hidden_id_update)
                ->update(
                    [
                        'container_number' => $request->update_no,
                        'container_type_id' => $request->update_type,
                        'container_grade_id' => $request->update_grade,
                        'enterprise_id' => $request->update_agent,
                        'status' => $request->update_status,
                        'manage_in_date' => $request->update_date,
                        'manage_in_driver_name' => $request->update_name,
                        'manage_in_driver_tel' => $request->update_tel,
                        'manage_in_car_registration' => $request->update_car,
                        'manage_in_driver_enterprise' => $request->update_prise,
                        'updated_at' => now()
                    ]
                );
            return back()->withStatus(__('Container Update successfully.'));
        }
    }

    public function delete_container(Request $request)
    {
        $id_del = $request->delete_id;
        $delete_data = Container::find($id_del);
        $delete_data->delete();
        return back()->withStatus(__('Container Delete successfully.'));
    }



    public function expose_container(Request $request)
    {
        if ($request->expose_date == "" or $request->expose_agent  == "") {
            return back()->withStatus(__('can not Expose container!'));
        } elseif ($request->expose_name == "" or $request->expose_tel  == "") {
            return back()->withStatus(__('can not Expose container!!!'));
        } elseif ($request->expose_car == "" or $request->expose_prise  == "") {
            return back()->withStatus(__('can not Expose container!!!!!!!'));
        } else {
            DB::table('container')
                ->where('container_id', $request->id_expose)
                ->update(
                    [
                        'enterprise_id' => $request->expose_agent,
                        'status' => $request->expose_status,
                        'manage_out_date' => $request->expose_date,
                        'manage_out_driver_name' => $request->expose_name,
                        'manage_out_driver_tel' => $request->expose_tel,
                        'manage_out_car_registration' => $request->expose_car,
                        'manage_out_driver_enterprise' => $request->expose_prise,
                        'container_in_out' => 1,
                        'updated_at' => now()
                    ]
                );
            return back()->withStatus(__('Container Expose successfully.'));
        }
    }
}
