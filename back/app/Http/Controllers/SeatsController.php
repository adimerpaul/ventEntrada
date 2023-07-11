<?php

namespace App\Http\Controllers;

use App\Models\Seats;
use App\Http\Requests\StoreSeatsRequest;
use App\Http\Requests\UpdateSeatsRequest;

class SeatsController extends Controller{
    public function index(){
        $seats = Seats::all();
        return view('seats.index', compact('seats'));
    }
}
