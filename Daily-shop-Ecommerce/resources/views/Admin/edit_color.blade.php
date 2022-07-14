@extends('Admin/layout')
@section('page_title','Update Color')
@section('select_size','active')
@section('container')

<a href="{{url('admin/color/color_list')}}">
    <button type="button" class="btn btn-success">Color Attributes List</button>
</a>
<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-body">
                <div class="card-title">
                <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                {{session('message')}}
                    </div>
                    <h3 class="text-center title-2">Update Color</h3>
                </div>
                <hr>
                <form action="{{url('admin/color/update')}}" method="post">
                    @csrf
                    <div class="form-group">
                    <input id="cc-pament" name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['id']}}" required>
                        <label for="cc-payment" class="control-label mb-1">Color</label>
                        <input id="cc-pament" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data['color']}}" required>
                        @error('title')
                        {{$message}}
                        @enderror
                    </div>
                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                       Update Color
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection