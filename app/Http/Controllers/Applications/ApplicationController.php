<?php

namespace App\Http\Controllers\Applications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
	public function create($id)
	{
    	$Job =  Job::findOrFail($id);

		return view('pages.Applications.add_application', compact('Job'));
	}

	public function store(Request $request)
	{
		try {
			$application = new Application();
			$application->applicant_id = Auth::user()->id;
			$application->employer_id = $request->employer_id;
			$application->cover_letter = $request->cover_letter;
			$application->job_id = $request->job_id;

			$application->save();

			DB::commit(); // insert data
			toastr()->success(trans('messages.success'));
			return redirect()->route('Jobs.index');

		}

		catch (\Exception $e){
			DB::rollback();
			return redirect()->back()->withErrors(['error' => $e->getMessage()]);
		}	
	}
}
