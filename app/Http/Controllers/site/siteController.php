<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers;
class siteController extends Controller
{
    public function index()
    {
        return view('site.home.index'); //Endereço de nossa view
    }
}
