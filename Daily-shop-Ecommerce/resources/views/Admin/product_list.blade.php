@extends('Admin/layout')
@section('page_title','Products list')
@section('select_product','active')
@section('container')
<h1>Products List</h1>
<a href="{{url('admin/product/index')}}">
    <button type="button" class="btn btn-success">Create New Product</button>
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
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>product slug</th>
                        <th>Product brand</th>
                        <th>Product Image</th>
                        <th>Product_short_description</th>
                        <th>Product_Long_Description</th>
                        <th> Product_keywords_For_Search</th>
                        <th>Technical_Specification</th>
                        <th>Product_uses_In_Daily_life </th> 
                        <th>warrenty_Of_The_Product</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>
                            @if($list->category_id)
                            {{$list->catname->category_name}}
                            @endif
                        </td>
                        <td>{{$list->product_name}}</td>
                        <td>{{$list->product_slug}}</td>
                        <td>{{$list->product_brand}}</td>
                        <td> <img src="{{ asset('admin_assets/product_image/'.$list->image)}}" alt="tag" ></td>
                        <td>{{$list->short_desc}}</td>
                        <td>{{$list->desc}}</td>
                        <td>{{$list->keywords}}</td>
                        <td>{{$list->technical_specification}}</td>
                        <td>{{$list->uses}}</td> 
                        <td>{{$list->warrenty}}</td>
                        <td>
                            <a href="{{url('admin/product/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/product/edit')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>

                            
                            @if($list->status==0)
                            <a href="{{url('admin/product/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                            @elseif($list->status==1)
                            <a href="{{url('admin/product/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
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