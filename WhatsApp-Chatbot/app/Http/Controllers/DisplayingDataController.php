<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\invoice_data;
use App\Models\InvoicesData;
use Illuminate\Support\Facades\DB;

class DisplayingDataController extends Controller
{
    public function DisplayDashboard()
    {
        // $data = invoice_data::all();
        // $data = DB::table('invoice_datas')->get();
        $data = invoice_data::all();
        return view('Dashboard', ['data' => $data]);
        // return $data;
    }
}
