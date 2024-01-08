<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;

class UserController extends Controller
{
  public function index()
  {
    try {
        hasPermission('view users');
        $Users = User::all();
        return view('pages.Users.users',compact('Users'));
    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
  }


  public function create()
	{
    try {
      hasPermission('create users');

      return view('pages.Users.add_user');

    } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
	}

  public function store(Request $request)
	{
    try {
        hasPermission('create users');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        DB::commit(); // insert data
        toastr()->success(trans('messages.success'));
        return redirect()->route('users.create');

      } catch (AuthorizationException $e) {
        // User does not have the required permission
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  public function edit($id)
  {
    try {
          hasPermission('edit users');
          $user = User::findOrFail($id);
          return view('pages.Users.edit_user', compact('User'));
      } catch (AuthorizationException $e) {
          // User does not have the required permission
          abort(403, $e->getMessage());
    }
  }

  public function update(Request $request)
  {
      try {
          hasPermission('edit users');
          // Update the user
          $Edit_user = User::findorfail($request->id);
          $Edit_user->name = $request->name;
          $Edit_user->email = $request->email;
          $Edit_user->password = Hash::make($request->password);
          $Edit_user->save();
          toastr()->success(trans('messages.Update'));
          return redirect()->route('users.index');
      } catch (AuthorizationException $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

	//This is the function that loads the detail page
	public function show($id)
	{
    try {
        hasPermission('view users');

        $User = User::findorfail($id);

        return view('pages.Users.user_detail', compact('User'));

      } catch (AuthorizationException $e) {
        // User does not have the required permission
        abort(403, $e->getMessage());
    }
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
      hasPermission('delete users');

      $User = User::findOrFail($id)->delete();
      return redirect()->route('users.index');
  
    } catch (AuthorizationException $e) {
        // User does not have the required permission
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

}

