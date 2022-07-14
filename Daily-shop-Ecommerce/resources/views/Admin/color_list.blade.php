@extends('Admin/layout')
@section('page_title','Color list')
@section('size_list','active')
@section('container')
<h1>Color List</h1>
<a href="{{url('admin/color/index')}}">
    <button type="button" class="btn btn-success">Create New Color</button>
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
                        <th>Color Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->color}}</td>
                        <td>
                            <a href="{{url('admin/color/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/color/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            
                            @if($list->status==1)
                            <a href="{{url('admin/color/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/color/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
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