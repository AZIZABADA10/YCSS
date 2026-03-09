<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DejeunerController extends Controller
{
    public function index()
    {
        return view('admin.dejeuner.index');
    }
}
