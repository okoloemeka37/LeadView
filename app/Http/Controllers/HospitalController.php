<?php

namespace App\Http\Controllers;
use App\Models\HospitalList;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
   public function getHospitalList()  {
        $lists=HospitalList::get();
        return view("welcome", ['lists'=>$lists]);
    }
}
