@extends('Admin/layout')
@section('page_title','Attributs Size')
@section('select_size','active')
@section('container')

<a href="{{url('admin/size/size_list')}}">
    <button type="button" class="btn btn-success">Size Attributs List</button>
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
                    <h3 class="text-center title-2">Create Size Attirbuts</h3>
                </div>
                <hr>
                <form action="{{url('admin/size/create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Size Attributs Name</label>
                        <input id="cc-pament" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('size')
                        {{$message}}
                        @enderror
                    </div>
                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                          Create Size
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection