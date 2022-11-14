@extends('Admin/layout')
@section('page_title','create post')
@section('select_blog','active')
@section('container')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<a href="category">
    <button type="button" class="btn btn-success">Post List</button>
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
                    <h3 class="text-center title-2">Create Post</h3>
                </div>
                <hr>
                <form action="{{route('create_blog_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Post Title *</label>
                        <input id="cc-pament" name="post_title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('post_title')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">post Description</label>
                        <textarea id="cc-pament" name="post_description" class="form-control" aria-required="true" aria-invalid="false"></textarea>
                    </div>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('post_description')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
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

<script>
    CKEDITOR.replace('post_description');
 
</script>
@endsection