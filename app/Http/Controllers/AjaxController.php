<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getValue(Request $request){
        $nilai = $request->get('nilai');
        $data = json_decode($nilai, true);
        return $data;
        // Olah Data Foreach di Uncoment
        // foreach($data as $d){
        //     echo $d;
        // }
    }
}
