<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Conta;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        return view('admin.index');
    }
}
