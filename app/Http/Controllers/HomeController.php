<?php

namespace App\Http\Controllers;
use App\Models\Agent;

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
        return view('dashboard');
    }
    public function export()
    {
        $agent_data = Agent::orderby('enterprise_name', 'asc')->get();
        return view('pages/container-management/export-container/index', [
            'agent_data' => $agent_data
        ]);
    }
}
