@extends('Admin/layout')
@section('page_title','create category')
@section('select_category','active')
@section('container')

<a href="category">
    <button type="button" class="btn btn-success">Category List</button>
</a>
<div class="row">
    <div class="col-lg-8">
        <div class="card">

            <div class="card-body">
                <div class="card-title">



                <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                {{session('message')}}
                    </div>

                   

                    <h3 class="text-center title-2">Create Category</h3>
                </div>
                <hr>
                <form action="{{route('manage_category_process')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input id="cc-pament" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('category_name')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Slug Name</label>
                        <input id="cc-pament" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('category_slug')
                        {{$message}}
                        @enderror
                    </div>


                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection