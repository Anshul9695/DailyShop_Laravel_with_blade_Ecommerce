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
                    <h3 class="text-center title-2">Generate The Coupon</h3>
                </div>
                <hr>
                <form action="{{route('create_coupon')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coupon Title</label>
                        <input id="cc-pament" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('title')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coupon Code</label>
                        <input id="cc-pament" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('code')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coupon Value</label>
                        <input id="cc-pament" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        @error('value')
                        {{$message}}
                        @enderror
                    </div>



                    <h2 class="mb10">Coupons Settings </h2>
            <div class="col-lg-12" id="product_attr_box">
               <div class="card" id="product_attr">
                  <div class="card-body">
                     <div class="form-group">
                        <div class="row">

                        <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1">Type</label>
                              <select id="color_id" name="type" class="form-control">
                                 <option value="value" selected>value</option>
                                    <option value="per">persentage</option>
                              </select>
                           </div>
                        <div class="col-md-3">
                              <label for="sku" class="control-label mb-1"> Min Order Amount</label>
                              <input id="sku" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                           </div>
                           <div class="col-md-3">
                              <label for="color_id" class="control-label mb-1">Only For Once</label>
                              <select id="color_id" name="is_once_time" class="form-control">
                                 <option value="1" selected>yes</option>
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
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection