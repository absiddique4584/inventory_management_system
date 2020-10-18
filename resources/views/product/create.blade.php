@extends('product.layout')
@section('content')

   <div class="row">
       <div style="margin-top: 20px;">
           <div>
               <h3> Add New Product </h3>
           </div>
           <div style="margin-left: 900px;">
               <a  class="btn btn-success" href="{{route('product.index')}}">Manage Products</a>
           </div>
       </div>
   </div>

   <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
       @csrf

       <div class="row">
           <div class="col-xs-6 col-md-6 col-sm-6">
               <div class="form-group">
                   <strong>Product Name</strong>
                   <input type="text" name="product_name" class="form-control" placeholder="Product Name">
               </div>
           </div>

           <div class="col-xs-6 col-md-6 col-sm-6">
               <div class="form-group">
                   <strong>Product Code</strong>
                   <input type="text" name="product_code" class="form-control" placeholder="Product Code">
               </div>
           </div>


           <div class="col-xs-6 col-md-6 col-sm-6">
               <div class="form-group">
                   <strong>Product Details</strong>
                   <textarea   type="text" name="details" class="form-control" placeholder="Product Details"></textarea>
               </div>
           </div>

           <div class="col-xs-6 col-md-6 col-sm-6">
               <div class="form-group">
                   <strong>Product Logo</strong>
                   <input type="file" name="logo" class="form-control" >
               </div>
           </div>

           <div class="col-xs-12 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-primary">Add Product</button>
           </div>

       </div>

   </form>
    @endsection
