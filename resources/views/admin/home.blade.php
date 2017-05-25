@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                        <tr>
                          <td><img width="250" height="250" class="img-responsive img-rounded" src="{{$category->photo}}"/></td>
                          <td>{{$category->name}}</td>
                          <td>
                            <a href="{{url('/category/'.$category->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form  action="{{ url('/category/'.$category->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              {{ csrf_field() }}
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      {!! $categories->links()!!}
                    </table>
                    <a href="{{url('/category/create')}}" class="btn btn-success">Add New Category</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resturants</div>

                <div class="panel-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Food Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resturants as $resturant)
                        <tr>
                          <td><img width="250" height="250" class="img-responsive img-rounded" src="{{$resturant->photo}}"/></td>
                          <td><a href="{{url('/resturant/'.$resturant->id)}}" target="_blank">{{$resturant->name}}</a></td>
                          <td>{{$resturant->address}}</td>
                          <td>{{$resturant->phone}}</td>
                          <td>{{$resturant->category->name}}</td>
                          <td>
                            <a href="{{url('/resturant/'.$resturant->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form  action="{{ url('/resturant/'.$resturant->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              {{ csrf_field() }}
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      {!! $resturants->links()!!}
                    </table>
                    <a href="{{url('/resturant/create')}}" class="btn btn-success">Add New Resturant</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
