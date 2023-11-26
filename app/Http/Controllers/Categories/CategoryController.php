<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.Categories.categories',compact('categories'));
  
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $category = new Category();
          
            $category->name = $request->name;
            $category->code = $request->code;
            $category->status = $request->status;
            $category->description = $request->description;

            $category->save();

            toastr()->success(trans('messages.success'));
            return redirect()->route('categories.index');
        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $category = Category::findorfail($id);
            $category->name = $request->name;
            $category->code = $request->code;
            $category->status = $request->status;
            $category->description = $request->description;

            $category->save();
      
            $category->save();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        
        return redirect()->route('categories.index');
    }
}
