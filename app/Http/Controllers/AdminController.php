<?php

namespace App\Http\Controllers; // its controller in this path - laravel can find it base on just name

use Illuminate\Http\Request;
use App\Models\User; // read write data to DB users


class AdminController extends Controller
{
    // zobrazenie hlavnej admin stranky
    public function dashboard()
    {
        return view('admin.admin_index');
    }

}
