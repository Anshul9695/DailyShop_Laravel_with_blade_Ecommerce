@extends('Admin/layout')
@section('page_title','Create Coupon')
@section('select_coupon','active')
@section('container')

<a href="{{url('admin/coupon/coupon_list')}}">
    <button type="button" class="btn btn-success">Coupon List</button>
</a>
<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-body">
                <div class="card-title">

                @if(session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        {{session('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    <h3 class="text-center title-2">Update Coupon</h3>
                </div>
                <hr>
                <form action="{{url('admin/coupon/update')}}" method="post">
                    @csrf
                    <div class="form-group">
                    <input id="cc-pament" name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['id']}}" required>
                        <label for="cc-payment" class="control-label mb-1">Coupon Title</label>
                        <input id="cc-pament" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['title']}}" required>
                        @error('title')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coupon Code</label>
                        <input id="cc-pament" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['code']}}" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('code')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coupon Value</label>
                        <input id="cc-pament" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['value']}}" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('value')
                        {{$message}}
                        @enderror
                    </div>

                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                       Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection