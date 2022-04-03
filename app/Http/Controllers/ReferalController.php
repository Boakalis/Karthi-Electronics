<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferalController extends Controller
{
    public function index()
    {
        return view('admin.referal.index');
    }
}
