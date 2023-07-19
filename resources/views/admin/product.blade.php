<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    .title{
        color:white; 
        padding-top:25px;
        font-size:20px;

    }
    label{
        display:inline-block;
        width:200px;
    }
    </style>
  </head>
  <body>
    
      @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
     <div class="container-fluid page-body-wrapper">
        <div  class="container"align="center">

   
       <h1 class="title">Add Product </h1>
       
       @if(session()->has('message'))
       <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert">X</button>
        </div>
       {{session()->get('message')}}

        @endif

      <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div style="padding:15px;">
       <label> Product title</label>
       <input  style="color:black;" type="text" name="title" placeholder="give a product title" required="">
     </div>
     <div style="padding:15px;">
       <label> Price</label>
       <input  style="color:black;" type="number" name="price" placeholder="enter Price" required="">
     </div>
     <div style="padding:15px;">
       <label> Description</label>
       <input  style="color:black;" type="text" name="description" placeholder="Description" required="">
     </div>
     <div style="padding:15px;">
       <label> Quantity</label>
       <input    style="color:black;" type="number" name="quantity" placeholder="give Quantity" required="">
     </div>
     <div style="padding:15px;">
     <input style="color:black;" type="file" name="file">
</div>
<div style="padding:15px;">
<input class="btn btn-success" type="submit">
</div>
</form>


    </div>
</div>
   @inlcude('admin.script')
  </body>
</html>