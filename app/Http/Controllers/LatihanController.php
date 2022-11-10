<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function showMyname()
    {

        $myName = [
            "name" => "Ramdeni",
            "age" => "22",
            "address" => "Jakarta,Indonesia",
            "hobby" => "MENGHAMILI ANAK ORANG"
        ];
        return view('latihan.myname', [
            'data'=> $myName
        ]);
    }
}
