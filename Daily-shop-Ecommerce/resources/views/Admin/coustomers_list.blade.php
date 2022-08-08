@extends('Admin/layout')
@section('page_title','Coustomers list')
@section('select_cat_list','active')
@section('container')
<h1>Coustomers List</h1>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="row m-t-30">
<!-- <div class="alert alert-danger" role="alert">
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
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Coustomers Name</th>
                        <th>coustomers Email</th>
                        <th>coustomers PHone</th>
                        <!-- <th>Image</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->coustomer_name}}</td>
                        <td>{{$list->_coustomer_email}}</td>
                        <td>{{$list->coustomer_phone}}</td>
                        <!-- <td> <img src="{{ asset('admin_assets/media/'.$list->image)}}" alt="No Image Found" style="height: 100px; width:100px;" ></td> -->
                        <td>
                            <button type="button" value="{{$list->id}}" class="btn btn-success show_data" id="show_data">view</button>
                            @if($list->status==0)
                            <a href="{{url('admin/coustomer/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                            @elseif($list->status==1)
                            <a href="{{url('admin/coustomer/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->





    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Coustomer Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>


                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>

                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Coustomer Name</label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
$(document).on('click','.show_data',function(){
var client_id=$(this).val();
//alert(client_id);
$('#edit_model').modal('show');
$.ajax({
  type: 'GET', 
  url:'/admin/coustomer/single/'+client_id,
    success: function (responce) { // after success your get data
      //alert(responce);
    //console.log(responce.coustomer.coustomer_name);
    $("#name").val(responce.coustomer.coustomer_name);
    }
});
});


  });
</script>