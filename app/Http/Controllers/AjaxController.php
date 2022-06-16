<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getValue(Request $request)
    {
        $nilai = $request->get('nilai');
        $data = json_decode($nilai, true);
        $output = 0;
        foreach ($data as $value) {
            $output += $value;
        }
        return $output / 10;
    }
}
