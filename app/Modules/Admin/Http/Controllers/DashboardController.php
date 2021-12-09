<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;




class DashboardController extends Controller
{	
    public function index(Request $request)
    {
        return view('admin::dashboard.index');
    }

 

}
