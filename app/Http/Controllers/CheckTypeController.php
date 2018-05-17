<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function check_type() {
        if(Auth::user()->type == 'NISIT') {
            return redirect('/nisit');
        }
        else if(Auth::user()->type == 'STAFF') {
            return redirect('/staff');
        }
        else if(Auth::user()->type == 'ASSESSOR') {
            return redirect('/assessor');
        }
    }
}
