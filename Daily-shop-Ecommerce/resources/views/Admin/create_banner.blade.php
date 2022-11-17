@extends('Admin/layout')
@section('page_title','Home Banners')
@section('select_banner','active')
@section('container')

<a href="{{url('admin/product/brand/list')}}">
    <button type="button" class="btn btn-success">Banner List</button>
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
                    <h3 class="text-center title-2">Create Banners</h3>
                </div>
                <hr>
                <form action="{{url('admin/banner/manage_process')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">

                    <input type="hidden" name="id" value="{{$id}}"/>
                        <label for="cc-payment" class="control-label mb-1">BTN TXT : </label>
                        <input id="cc-pament" name="btn_txt" value="{{$btn_txt}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('btn_txt')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                       
                        <label for="cc-payment" class="control-label mb-1">BTN LINK : </label>
                        <input id="cc-pament" name="btn_link" value="{{$btn_link}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('btn_link')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Banner IMAGE</label>
                        <input type="file" id="img" name="image" class="form-control col-md-7 col-xs-12">
                        @if($image!='')
                                            <a href="{{asset('storage/media/banner/'.$image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/banner/'.$image)}}"/></a>
                                        @endif
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