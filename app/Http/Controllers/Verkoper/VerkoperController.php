<?php

namespace App\Http\Controllers\Verkoper;

namespace App\Http\Controllers\Verkoper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerkoperController extends Controller
{
    public function index()
    {
        return view('verkopers.index');
    }
}
