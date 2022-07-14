@extends('Admin/layout')
@section('page_title','Size list')
@section('size_list','active')
@section('container')
<h1>Size List</h1>
<a href="{{url('admin/size/index')}}">
    <button type="button" class="btn btn-success">Create New Size</button>
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
                        <th>Size Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->size}}</td>
                        <td>
                            <a href="{{url('admin/size/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/size/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            
                            @if($list->status==1)
                            <a href="{{url('admin/size/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/size/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
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