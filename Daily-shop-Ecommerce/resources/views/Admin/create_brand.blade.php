@extends('Admin/layout')
@section('page_title','Product Brand')
@section('select_brand','active')
@section('container')

<a href="{{url('admin/product/brand/list')}}">
    <button type="button" class="btn btn-success">Brand List</button>
</a>
<div class="row">
    <div class="col-lg-8">
        <div class="card">

        @if(session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Create Brands</h3>
                </div>
                <hr>
                <form action="{{url('admin/product/brand/manage_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                    <input type="hidden" name="id" value="{{$id}}"/>
                        <label for="cc-payment" class="control-label mb-1">BRAND NAME : </label>
                        <input id="cc-pament" name="name" value="{{$name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('color')
                        {{$message}}
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">BRAND IMAGE</label>
                        <input type="file" id="img" name="image" class="form-control col-md-7 col-xs-12">
                       
                        <img src="{{ asset('admin_assets/product_image/'.$image)}}"  style="height:100px;width:100px;" >
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('image')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                          Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection