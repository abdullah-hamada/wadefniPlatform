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
	public function index()
	{
		$Applications = Application::select('*')->with('job')->get();

		return view('pages.Applications.applications',compact('Applications'));
	}

	public function create($id)
	{
    	$job =  Job::findOrFail($id);

		return view('pages.Applications.add_application', compact('job'));
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
			return redirect()->route('jobs.index');

		}

		catch (\Exception $e){
			DB::rollback();
			return redirect()->back()->withErrors(['error' => $e->getMessage()]);
		}	
	}

	public function show($id)
	{
    	$Application = Application::findorfail($id)->with('job')->first();

		return view('pages.Applications.application_detail', compact('Application'));
	}

}
