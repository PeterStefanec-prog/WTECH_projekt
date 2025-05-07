<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderConfirmedController extends Controller
{
    public function index(){
        return view('shop.order_confirmed');
    }
}
