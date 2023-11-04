<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
  {
      $Users = User::all();
      return view('pages.Users.Users',compact('Users'));
  }


  public function create()
	{
		return view('pages.Users.add_user');
	}

  public function store(Request $request)
	{
    try {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

      DB::commit(); // insert data
      toastr()->success(trans('messages.success'));
      return redirect()->route('Users.create');

  }

  catch (\Exception $e){
      DB::rollback();
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }	}

  public function edit($id)
	{
    $User =  User::findOrFail($id);
    return view('pages.Users.edit_user',compact('User'));
	}

  public function update($request)
    {
        try {
          // dd($request);
            $Edit_user = User::findorfail($request);
            $Edit_user->name = $request->name;
            $Edit_user->email = $request->email;
            $Edit_user->password = Hash::make($request->password);
            $Edit_user->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Users.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

	//This is the function that loads the detail page
	public function show($id)
	{
    $User = User::findorfail($id);
		return view('pages.Users.user_detail', compact('User'));
	}


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {

          $Users = User::findOrFail($id)->delete();
          return redirect()->route('Users.index');
      }

}

