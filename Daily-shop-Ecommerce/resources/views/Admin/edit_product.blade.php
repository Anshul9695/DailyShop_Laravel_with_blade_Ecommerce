@extends('Admin/layout')
@section('page_title','Update Products')
@section('select_product','active')
@section('container')


<div class="row">
    <div class="col-lg-10">
        <div class="card">
        <a href="{{url('admin/product/list')}}">
    <button type="button" class="btn btn-success">Product List</button>
</a>
            <div class="card-body">
                <div class="card-title">



                    <!-- <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
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

                    <h3 class="text-center title-2">Update Product</h3>
                </div>
                <hr>
                <form action="{{url('admin/product/update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="cc-pament" name="id" type="hidden" class="form-control" aria-required="true" value="{{$data->id}}" aria-invalid="false">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                        <input id="cc-pament" name="product_name" type="text" class="form-control" value="{{$data->product_name}}" aria-required="true" aria-invalid="false">
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('product_name')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Select Category </label>
                        <!-- <p>{{$data->category_id}}</p> -->
                        <select class="form-control " name="category_id">
                          
                            @foreach($categories as $cat)

                            <option  value="{{$cat->id}}" {{ $data->category_id == $cat->id ? 'selected' : '' }}>{{$cat->category_name}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Slug Name</label>
                        <input id="cc-pament" name="product_slug" type="text" class="form-control" value="{{$data->product_slug}}" aria-required="true" aria-invalid="false">
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('product_slug')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Brand</label>
                        <input id="cc-pament" name="product_brand" type="text" class="form-control" value="{{$data->product_brand}}" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('product_brand')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Short Description</label>
                        <textarea id="cc-pament" name="short_desc" class="form-control" aria-required="true" aria-invalid="false">{{$data->short_desc}}</textarea>
                    </div>


                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('short_desc')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Long Description</label>
                        <textarea id="cc-pament" name="desc" class="form-control" aria-required="true" aria-invalid="false">{{$data->desc}}</textarea>
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('desc')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">KeyWords</label>
                        <textarea id="cc-pament" name="keywords" class="form-control" aria-required="true" aria-invalid="false">{{$data->keywords}}</textarea>
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('keywords')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Technical Spacification </label>
                        <textarea id="cc-pament" name="technical_specification" class="form-control" aria-required="true" aria-invalid="false">{{$data->technical_specification}}</textarea>
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('technical_specification')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Uses </label>
                        <textarea id="cc-pament" name="uses" class="form-control" aria-required="true" aria-invalid="false">{{$data->uses}}</textarea>
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('uses')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Warrenty </label>
                        <textarea id="cc-pament" name="warrenty" class="form-control" aria-required="true" aria-invalid="false">{{$data->warrenty}}</textarea>
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('warrenty')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Image</label>
                        <input type="file" id="img" name="image"  class="form-control col-md-7 col-xs-12">
                        <img src="{{ asset('admin_assets/product_image/'.$data->image)}}" alt="tag" style="height:100px;width:100px;" >
                    </div>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success"></span>
                        @error('image')
                        {{$message}}
                        @enderror
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection