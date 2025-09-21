<?php
use App\Http\Controllers\HospitalController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HospitalController::class ,"getHospitalList"]);


