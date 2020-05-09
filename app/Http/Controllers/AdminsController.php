<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
class AdminsController extends Controller
{
    public function index(){
        return view('admins.index')->withCars(Car::orderBy('created_at','DESC')->paginate(10));
    }
}
