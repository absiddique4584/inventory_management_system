@extends('product.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br>
            <div style="margin-top: 20px;">
                <div>
                    <h3>Laravel Product List</h3>
                </div>
                <div style="margin-left: 900px;">
                    <a  class="btn btn-success" href="{{route('product.create')}}">Create New Product</a>
                </div>
            </div>
            <br>
            <br>

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                   <p>{{$message}}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th width="150px ">Product Name</th>
                    <th width="150px ">Product Code</th>
                    <th width="250px ">Details</th>
                    <th width="150px ">Product Logo</th>
                    <th width="300px ">Action</th>
                </tr>
                <tr>
                    @foreach($products as $product)
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{substr($product->details,0,50)}}...</td>
                    <td>{{$product->logo}}</td>
                    <td>
                        <a class="btn btn-info " href="">Show</a>
                        <a class="btn btn-primary" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@endsection
