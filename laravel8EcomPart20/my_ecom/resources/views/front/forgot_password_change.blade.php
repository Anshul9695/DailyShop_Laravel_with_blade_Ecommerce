@extends('front/layout')
@section('page_title','Password Change')
@section('container')
<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Password Update</h4>
                 <form action="" class="aa-login-form" id="frmUpdatePassword">
                    <label for="">Password<span>*</span></label><br/>
                    <span id="password_error" class="field_error"></span>
                    <input type="password" name="password" placeholder="Password" required>
                  
                    <button type="submit" class="aa-browse-btn" id="btnUpdatePassword">Update</button>  <br/>
                    <div id="thankyou_msg" class="thankyou_message"></div>     
                    @csrf             
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection