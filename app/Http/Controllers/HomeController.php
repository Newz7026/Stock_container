<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $container = DB::table('container')
            ->select(DB::raw('count(container.container_id) as sum_type, container_type.container_type as typename '))
            ->join('container_type', 'container.container_type_id', '=', 'container_type.container_type_id')
            ->groupBy('container.container_type_id')
            ->get();


        return view('dashboard', [
            'cstr_data' => $container
        ]);
    }
    public function export()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        return view('pages/container-management/export-container/index', [
            'agent_data' => $agent_data
        ]);
    }
}
