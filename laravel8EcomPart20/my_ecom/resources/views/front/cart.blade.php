@extends('front/layout')
@section('page_title','Cart Details')
@section('container')

<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
                 @if(isset($list[0]))
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $data)
                      <tr id="cart_box_{{$data->attr_id}}">
                        <td><a class="remove" href="javascript:void(0)" onclick="deleteCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->color}}','{{$data->attr_id}}')"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="{{url('product/'.$data->slug)}}"><img  src="{{asset('storage/media/'.$data->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="{{url('product/'.$data->slug)}}">{{$data->name}}</a>
                    @if($data->size!='')
                    <br/>Size: {{$data->size}}
                    @endif
                    @if($data->color!='')
                    <br/>Color: {{$data->color}}
                    @endif
                    </td>
                   
                    <td>Rs {{$data->price}}</td>
      
                    <td><input class="aa-cart-quantity" type="number" id="qty{{$data->attr_id}}" value="{{$data->qty}}" onchange="updateCartQty('{{$data->pid}}','{{$data->size}}','{{$data->color}}','{{$data->attr_id}}','{{$data->price}}')">

                </td>
                        <td id="total_price_{{$data->attr_id}}">Rs {{$data->price*$data->qty}}</td>
                    </tr>
                      @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                         
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
                @else   
                <h3>No Product Added In Cart</h3>
                @endif
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
            
               <table class="aa-totals-table">
               </table>
               <a href="{{url('/checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
  <!-- / product category -->
  <input type="hidden" id="qty" value="1">
  <form id="frmAddToCart">
  <input type="hidden" id="size_id" name="size_id">
  <input type="hidden" id="color_id" name="color_id">
  <input type="hidden" id="pqty" name="pqty" >
  <input type="hidden" id="product_id" name="product_id">
@csrf
  </form>
@endsection