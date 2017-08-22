@extends('admin.layouts.default')
@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Categories <span class="badge badge-info">@if(isset($count)) {{$count}} @endif</span></h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
@include('errors.errors')

<div class="col-sm-8 mb-10">
    <form class="form-inline" role="form" method="post" action="/admin/categories">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Category name" required autofocus>
            <input type="text" class="form-control" name="icon" placeholder="Category icon" required>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light  btn-md">Add category</button>


        <div class="mt-10">
            <p class="text-muted">Type in <span class="bg-info text-white p-1">fa fa-tag</span> as the value of the icon</p>
        </div>
    </form>
</div>
<div class="clearfix"></div>

@if(isset($categories) && count($categories) > 0)
    <div class="table-responsive col-md-10 col-md-offset-1">
        <div>{!! $categories->links() !!}</div>

        <table class="table m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Icon</th>
                <th>Items</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $index => $category)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->icon }}</td>
                    <td>{{ $category->items_count }}</td>
                    <td> <a class="label label-info" href="/admin/categories/{{$hashIds->encode($category->id)}}/edit">Edit</a> </td>
                    <td> <a class="label label-danger" href="/admin/categories/{{$hashIds->encode($category->id)}}/delete">Delete</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
     <div>
         <p class="text-danger">No categories added yet</p>
     </div>
    @endif

<div class="clearfix"></div>
@endsection