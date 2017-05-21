<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resturant;
use Illuminate\Support\Facades\Storage;
class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->can('create',Resturant::class)){
          return view('resturant.create');
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

        if(auth()->user()->can('create',Resturant::class)){
          $this->validate($request,[
            'address' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'photo' => 'required'
          ]);
          $path = $request->file('photo')->store('public');
          $resturant = Resturant::Create([
            'name' => $request->name,
            'photo' => Storage::url($path),
            'address' => $request->address,
            'phone' => $request->phone,
            'food_category_id' => $request->food_category_id
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
        $resturant = Resturant::findOrFail($id);
        if(auth()->user()->can('delete',$resturant)){
          $resturant->delete();
          return back();
        }
        else{
          abort(401);
        }
    }
}
