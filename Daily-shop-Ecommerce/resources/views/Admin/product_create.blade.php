@extends('Admin/layout')
@section('page_title','Create Products')
@section('select_product','active')
@section('container')

<a href="{{url('admin/product/list')}}">
    <button type="button" class="btn btn-success">Product List</button>
</a>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<div class="row">
    <div class="col-lg-10">
        <div class="card">

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

                    <h3 class="text-center title-2">Create Product</h3>
                </div>
                <hr>
                <form action="{{url('admin/product/create')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Name</label>
                        <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
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
                        <select class="form-control " name="category_id">
                            <option value="">Select catogery</option>
                            @foreach($catagory as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Slug Name</label>
                        <input id="cc-pament" name="product_slug" type="text" class="form-control" aria-required="true" aria-invalid="false">
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
                    <label for="color_id" class="control-label mb-1"> Product Brand</label>
                              <select id="color_id" name="product_brand" class="form-control">
                                  @foreach($brands as $brand)
                                 <option value="{{$brand->id}}">{{$brand->name}}</option>        
                                    @endforeach
                              </select>
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
                        <textarea id="cc-pament" name="short_desc" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <textarea id="cc-pament" name="desc" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <textarea id="cc-pament" name="keywords" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <textarea id="cc-pament" name="technical_specification" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <textarea id="cc-pament" name="uses" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <textarea id="cc-pament" name="warrenty" class="form-control" aria-required="true" aria-invalid="false"></textarea>
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
                        <input type="file" id="img" name="image" required="required" class="form-control col-md-7 col-xs-12">
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


                    <h2 class="mb10">Add Extra Information</h2>
            <div class="col-lg-12" id="product_attr_box">
               <div class="card" id="product_attr">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row">

                        <div class="col-md-3">
                              <label for="sku" class="control-label mb-1"> Lead Time</label>
                              <input id="sku" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                           </div>

                           <div class="col-md-3">
                              <label for="sku" class="control-label mb-1"> Tax</label>
                              <input id="sku" name="tax" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                           </div>
                           <div class="col-md-3">
                              <label for="mrp" class="control-label mb-1"> Tax Type</label>
                              <input id="mrp" name="tax_type" type="text" class="form-control" aria-required="true" aria-invalid="false">
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Is Promotainal</label>
                              <select id="color_id" name="is_promo" class="form-control">    
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Is Featured Product</label>
                              <select id="color_id" name="is_featured" class="form-control">
                                  
                                 <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Is_Discount</label>
                              <select id="color_id" name="is_discount" class="form-control">
                                    
                                 <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1"> Is Tranding</label>
                              <select id="color_id" name="is_tranding" class="form-control">
                                  
                                 <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>



                    <div>
                        <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                            Create Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('short_desc');
   CKEDITOR.replace('desc');
   CKEDITOR.replace('technical_specification');
   CKEDITOR.replace('uses');
   CKEDITOR.replace('warrenty');
</script>

@endsection