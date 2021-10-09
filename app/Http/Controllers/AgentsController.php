<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function agent()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        return view('pages.container-management.agent-management.index', [
            'agent_data' => $agent_data
        ]);
    }
    public function insert_agent(Request $request)
    {


        if ($request->name_agent == "" or $request->add_agent == "") {
            return back()->withStatus(__('Can not insert successfully.'));
        } elseif ($request->tax_agent == "") {
            return back()->withStatus(__('Can not insert successfully.'));
        }  else {
            $insert_agent = new Agent();
            $insert_agent->enterprise_name = $request->name_agent;
            $insert_agent->enterprise_add = $request->add_agent;
            $insert_agent->enterprise_phone = $request->tel_agent;
            $insert_agent->enterprise_fax = $request->fax_agent;
            $insert_agent->enterprise_taxpayer = $request->tax_agent;
            $insert_agent->save();
            return back()->withStatus(__('Agent insert successfully.'));
        }
    }
    public function update_agent(Request $request)
    {
        if ($request->edit_name == "" or $request->edit_add == "") {
            return back()->withStatus(__('Can not update successfully.'));
        } elseif ($request->edit_tax == "") {
            return back()->withStatus(__('Can not update successfully.'));
        }  else {
        $id_edit = $request->edit_id;
        $insert_agent = Agent::find($id_edit);
        $insert_agent->enterprise_name = $request->edit_name;
        $insert_agent->enterprise_add = $request->edit_add;
        $insert_agent->enterprise_phone = $request->edit_phone;
        $insert_agent->enterprise_fax = $request->edit_fax;
        $insert_agent->enterprise_taxpayer = $request->edit_tax;
        $insert_agent->save();
        return redirect()->route('agent')->withStatus(__('Agent Edit successfully.'));
        }
    }

    public function delete_agent(Request $request)
    {
        $id_del = $request->delete_id;
        $delete_data = Agent::find($id_del);
        $delete_data->delete();
        return redirect()->route('agent')->withStatus(__('Agent Delete successfully.'));
    }
}
