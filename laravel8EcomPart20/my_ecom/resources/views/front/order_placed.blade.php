@extends('front/layout')
@section('page_title','Order Placed')
@section('container')
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
     <br><br><br><br><br>
     <h3>Your Order placed Successfully</h3>
     <h3>Your Order Id :- {{session()->get('ORDER_ID')}}</h3>
     <br><br><br><br><br>
       
      </div>
    </div>
  </section>
 
@endsection