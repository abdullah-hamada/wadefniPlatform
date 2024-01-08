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

      $Jobs = Job::all();
      return view('pages.Jobs.jobs',compact('Jobs'));

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

      $Job = new Job();
      $Job->employer_id = Auth::user()->id;
      $Job->title = $request->title;
      $Job->description = $request->description;
      $Job->location = $request->location;
      $Job->salary_range = $request->salary_range;
      $Job->employment_type = $request->employment_type;
      $Job->status = $request->status;

      $Job->save();

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

      $Job =  Job::findOrFail($id);
      return view('pages.Jobs.edit_job',compact('Job'));
  
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

      $Job = Job::findorfail($id);
      return view('pages.Jobs.job_detail', compact('Job'));
    
    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
	}

  public function availableJobs()
	{
    $Jobs = Job::avaliable()->get();
    
    return view('pages.Jobs.available_jobs',compact('Jobs'));
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

      $Jobs = Job::findOrFail($id)->delete();
      return redirect()->route('jobs.index');

    } catch (AuthorizationException $e) {
      // User does not have the required permission
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}