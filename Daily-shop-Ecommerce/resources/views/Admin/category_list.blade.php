@extends('Admin/layout')
@section('page_title','category list')
@section('select_cat_list','active')
@section('container')
<h1>Category List</h1>
<a href="create_category">
    <button type="button" class="btn btn-success">Create New Category</button>
</a>
<div class="row m-t-30">
<div class="alert alert-danger" role="alert">
        {{session('message')}}
    </div>
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>

                        <td>
                            <a href="category/delete/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/category/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>

                            
                            @if($list->status==0)
                            <a href="{{url('admin/category/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                            @elseif($list->status==1)
                            <a href="{{url('admin/category/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection