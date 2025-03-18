<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice_data;
use Illuminate\Container\Attributes\DB;

class DisplayDataController extends Controller
{
    public function DisplayData()
    {
        $Dashboard = invoice_data::all();

        return view('Dashboard', ['Dashboard' => $Dashboard]);
    }
}
