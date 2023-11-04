<?php

namespace App\Http\Controllers\Applications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function create()
	{
		return view('pages.Applications.add_application');
	}
}
