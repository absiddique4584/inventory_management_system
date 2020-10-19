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
                    <th width="100px ">Product Code</th>
                    <th width="390px ">Details</th>
                    <th width="100px ">Product Logo</th>
                    <th width="260px ">Action</th>
                </tr>
                @foreach($products as $product)
                <tr>

                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{substr($product->details,0,50)}}...</td>
                    <td><img style="width: 40px; height: 40px;" src="{{ asset('uploads/product/'.$product->logo) }}" alt=""></td>
                    <td>
                        <a class="btn btn-info " href="">Show</a>
                        <a class="btn btn-primary" href="{{ URL::to('edit/product/'.$product->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ URL::to('delete/product/'.$product->id) }}"
                        onclick="return confirm('Are You Sure ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
