<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function FormDataCollect(Request $request)
    {
        $name = $request->name;
        $phone_number = $request->phone_number;
        $item1 = $request->item1;
        $item2 = $request->item2;
    }
}
