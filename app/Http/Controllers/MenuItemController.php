<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItem;
use Illuminate\Support\Facades\Storage;
class MenuItemController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //(
        if($request->user()->can('create', \App\Resturant::class)){
          $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            //'photo' => 'required'
          ]);
          if($request->hasFile('photo')){
          $path = $request->file('photo')->store('public');
          }
          else{
            $path = null;
          }
          MenuItem::Create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => Storage::url($path),
            'resturant_id' => $request->resturant_id
          ]);
          return back();
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
        $item = MenuItem::findOrFail($id);
        return view('item.edit')->with([
          'item' => $item
        ]);
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
        $item = MenuItem::findOrFail($id);
        if($request->user()->can('create', \App\Resturant::class)){
          $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            //'photo' => 'required'
          ]);
          if($request->hasFile('photo')){
            $path = $request->file('photo')->store('public');
            $item->fill([
              'name' => $request->name,
              'description' => $request->description,
              'price' => $request->price,
              'photo' => Storage::url($path)
            ]);
            $item->save();
          }
          else{
            $item->fill([
              'name' => $request->name,
              'description' => $request->description,
              'price' => $request->price,

            ]);
            $item->save();
          }

          return redirect("/resturant/{$item->resturant->id}");
        }
        else{
          abort(401);
        }
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
        MenuItem::destroy($id);
        return back();
    }
}
