<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\AuthorizationException;

class JobController extends Controller
{
  public function index()
  {
    try {
      hasPermission('view jobs');

      $jobs = Job::all();
      return view('pages.Jobs.jobs',compact('jobs'));

    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
  }


  public function create()
	{
    try {
      hasPermission('create jobs');

      return view('pages.Jobs.add_job');

    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
	}

  public function store(Request $request)
	{
    try {
      hasPermission('create jobs');

      $job = new Job();
      $job->employer_id = Auth::user()->id;
      $job->title = $request->title;
      $job->description = $request->description;
      $job->location = $request->location;
      $job->salary_range = $request->salary_range;
      $job->employment_type = $request->employment_type;
      $job->status = $request->status;

      $job->save();

      DB::commit(); // insert data
      toastr()->success(trans('messages.success'));
      return redirect()->route('jobs.create');

  }

  catch (AuthorizationException $e){
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
	}

  public function edit($id)
	{
    try {
      hasPermission('edit jobs');

      $job =  Job::findOrFail($id);
      return view('pages.jobs.edit_job',compact('job'));
  
    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
	}

  public function update(Request $request, $id)
    {
      try {
            hasPermission('edit jobs');

            $job = Job::findorfail($id);
            $job->employer_id = Auth::user()->id;
            $job->title = $request->title;
            $job->description = $request->description;
            $job->location = $request->location;
            $job->salary_range = $request->salary_range;
            $job->employment_type = $request->employment_type;
            $job->status = $request->status;
      
            $job->save();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('jobs.index');
        } catch (AuthorizationException $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
    }

	//This is the function that loads the detail page
	public function show($id)
	{
    try {
      hasPermission('view jobs');

      $job = Job::findorfail($id);
      return view('pages.jobs.job_detail', compact('job'));
    
    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
	}

  public function availableJobs()
	{
    $jobs = Job::avaliable()->get();
    
    return view('pages.Jobs.available_jobs',compact('jobs'));
	}


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
    try {
      hasPermission('delete jobs');

      $jobs = Job::findOrFail($id)->delete();
      return redirect()->route('jobs.index');

    } catch (AuthorizationException $e) {
      // User does not have the required permission
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}