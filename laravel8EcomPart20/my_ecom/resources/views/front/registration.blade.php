@extends('front/layout')
@section('page_title','Register')
@section('container')
<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" id="frmRegistration">
                    <label for="">Username <span>*</span></label><br/>
                    <span id="name_error" class="field_error"></span>
                    <input type="text" name="name" placeholder="Username">
                   
                    <label for="">Email address<span>*</span></label><br/>
                    <span id="email_error" class="field_error"></span>
                    <input type="email" name="email" placeholder="email">
                   
                    <label for="">Mobile <span>*</span></label><br/>
                    <span id="mobile_error" class="field_error"></span>
                    <input type="text" name="mobile" placeholder="Mobile">
                  
                    <label for="">Password<span>*</span></label><br/>
                    <span id="password_error" class="field_error"></span>
                    <input type="password" name="password" placeholder="Password">
                  
                    <button type="submit" class="aa-browse-btn" id="btnRegistation">Register</button>  <br/>
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