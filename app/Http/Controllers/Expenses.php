<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Expenses extends Controller
{
    public function view()
    {
        $type = DB::table('container_type')
            ->orderBy('container_type', 'asc')
            ->get();
        return view('pages.container-management.receipt-management.management.expenses', [
            'data_type' => $type

        ]);
    }
    public function edit(Request $request)
    {
        if ($request->update == '') {
            DB::table('container_type')
                ->where('container_type_id', $request->id)
                ->update([
                    'price' => $request->price
                ]);

        } elseif ($request->delete == '') {
            DB::table('container_type')->where('container_type_id', '=', $request->id)->delete();
        }
        return back();
    }
}
