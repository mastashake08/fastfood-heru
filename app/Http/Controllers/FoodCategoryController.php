<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodCategory as Category;
use Illuminate\Support\Facades\Storage;
class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Category::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->can('create',Category::class)){
          return view('category.create');
        }
        else{
          abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(auth()->user()->can('create',Category::class)){
        $this->validate($request,[
          'name' => 'required',
          'photo' => 'required|file'
        ]);
        $path = $request->file('photo')->store('public');
        $category = Category::Create([
          'name' => $request->name,
          'photo' => Storage::url($path)
        ]);
        return redirect('/home');
      }
      else{
        abort(401);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        if(auth()->user()->can('delete', $category)){
          $category->delete();
          return back();
        }
        else{
          abort(401);
        }
    }
}
