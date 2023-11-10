<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class JobController extends Controller
{
    public function index()
  {
      $Jobs = Job::all();
      return view('pages.Jobs.jobs',compact('Jobs'));
  }


  public function create()
	{
		return view('pages.Jobs.add_job');
	}

  public function store(Request $request)
	{
    try {
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
      return redirect()->route('Jobs.create');

  }

  catch (\Exception $e){
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }	}

  public function edit($id)
	{
    $Job =  Job::findOrFail($id);
    return view('pages.Jobs.edit_job',compact('Job'));
	}

  public function update(Request $request, $id)
    {
        try {

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
            return redirect()->route('Jobs.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

	//This is the function that loads the detail page
	public function show($id)
	{
    $Job = Job::findorfail($id);
		return view('pages.Jobs.job_detail', compact('Job'));
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

          $Jobs = Job::findOrFail($id)->delete();
          return redirect()->route('Jobs.index');
      }

}