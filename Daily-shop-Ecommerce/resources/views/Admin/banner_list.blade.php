@extends('Admin/layout')
@section('page_title','banner list')
@section('select_banner','active')
@section('container')
<h1>Banner List</h1>
<a href="{{url('admin/banner/create')}}">
    <button type="button" class="btn btn-success">Create New Banner</button>
</a>
<div class="row m-t-30">
    <!-- <div class="alert alert-danger" role="alert">
        {{session('message')}}
    </div> -->
    @if(session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BTN TXT</th>
                        <th>BTN LINK</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->btn_txt}}</td>
                        <td>{{$list->btn_link}}</td>
<!-- <td>
    {{$list->image}}
</td> -->
                        <td>
                            {{$list->image}}
                            <img width="100px" src="{{asset('storage/media/banner/'.$list->image)}}"/>
                            </td>
                            
                        <td>
                            <a href="{{url('admin/banner/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/banner/create')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            
                            @if($list->status==1)
                            <a href="{{url('admin/banner/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/banner/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
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