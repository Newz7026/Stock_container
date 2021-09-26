<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\DB;

class ManagementOUTController extends Controller
{
    public function gate_out()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        $container = DB::table('container')
            ->join('enterprise', 'container.enterprise_id', '=', 'enterprise.enterprise_id')
            ->join('container_grade', 'container.container_grade_id', '=', 'container_grade.container_grade_id')
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->select('container.*', 'container_grade.container_grade_name', 'enterprise.enterprise_name', 'container_type.container_type')
            ->where('container_in_out', '=', '1')
            ->orderBy('container_id', 'asc')
            ->get();
        return view('pages.container-management.gate-out-management.index', [
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
        } elseif ($request->date_in == "" or $request->date_out  == "") {
            return back()->withStatus(__('Date is null.'));
        } elseif ($request->get_in_name == "" or $request->get_out_name  == "") {
            return back()->withStatus(__('Name Driver is null.'));
        } elseif ($request->get_in_tel == "" or $request->get_out_tel  == "") {
            return back()->withStatus(__('tel or enterprise is null.'));
        } elseif ($request->get_in_car == "" or $request->get_out_car  == "") {
            return back()->withStatus(__('registration is null.'));
        } elseif ($request->get_in_prise == "" or $request->get_out_prise  == "") {
            return back()->withStatus(__('Enterprise is null.'));
        } else {
            DB::table('container')->insert([
                [
                    'container_number' => $request->container_no,
                    'container_type_id' => $request->container_type_id,
                    'container_grade_id' => $request->container_grade_id,
                    'enterprise_id' => $request->enterprise_id,
                    'status' => $request->remark,
                    'manage_in_date' => $request->date_in,
                    'manage_in_driver_name' => $request->get_in_name,
                    'manage_in_driver_tel' => $request->get_in_tel,
                    'manage_in_car_registration' => $request->get_in_car,
                    'manage_in_driver_enterprise' => $request->get_in_prise,
                    'manage_out_date' => $request->date_out,
                    'manage_out_driver_name' => $request->get_out_name,
                    'manage_out_driver_tel' => $request->get_out_tel,
                    'manage_out_car_registration' => $request->get_out_car,
                    'manage_out_driver_enterprise' => $request->get_out_prise,
                    'container_in_out' => "1",
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
        } elseif ($request->update_name_out == "" or $request->update_date  == "") {
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
                        'manage_out_date' => $request->update_date_out,
                        'manage_out_driver_name' => $request->update_name_out,
                        'manage_out_driver_tel' => $request->update_tel_out,
                        'manage_out_car_registration' => $request->update_car_out,
                        'manage_out_driver_enterprise' => $request->update_prise_out,
                        'updated_at' => now()
                    ]
                );
            return back()->withStatus(__('Container Update successfully.'));
        }
    }
}
