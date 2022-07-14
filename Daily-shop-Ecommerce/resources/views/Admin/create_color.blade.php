@extends('Admin/layout')
@section('page_title','Attributs color')
@section('select_size','active')
@section('container')

<a href="{{url('admin/color/color_list')}}">
    <button type="button" class="btn btn-success">Color Attributs List</button>
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
                <!-- <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                {{session('message')}}
                    </div> -->
                    <h3 class="text-center title-2">Create color Attirbuts</h3>
                </div>
                <hr>
                <form action="{{url('admin/color/create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Color Attributs Name</label>
                        <input id="cc-pament" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('color')
                        {{$message}}
                        @enderror
                    </div>
                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                          Create Color
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection