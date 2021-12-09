<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function getToken()
    {
        return response()->json(array('status' => true, 'message' => 'Request processed successfully', 'data' => csrf_token()));
    }

    public function form()
    {
        return view('testform');
    }

}
