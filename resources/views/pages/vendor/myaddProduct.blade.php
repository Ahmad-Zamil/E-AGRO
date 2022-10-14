<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    @extends('../../layouts.app')
    @section('content')
    <div class="container">
    <div class="row">
        <div class="text-center">
            <h4>Add Product</h4>
            <a href="{{ route('productList') }}" class="btn btn-danger btn-sm mt-3 mb-3 px-3">Back</a>
        </div>
        <div class="col-12" style="display:contents">
           <div class="col-3 float-left"></div>
           <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('vendor.addProduct')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Name</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter the Product Name">
                                
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Category</label>
                                <select value="{{old('category')}}" name="category" class="form-control">
                                    <option value="">Select The Category</option>
                                    <option value="Vegetable">Vegetable</option>
                                    <option value="Grosary">Grosary</option>
                                </select>
                                
                                @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Quantity</label>
                                <input value="{{old('quantity')}}" type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Enter the Product Quantity">
                                
                                @error('quantity')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Price</label>
                                <input value="{{old('price')}}" type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter the Product Price">
                                
                                    @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Image</label>
                                <input value="{{old('image')}}" type="file" name="image"
                                     class="form-control w-100" id="exampleFormControlInput1">
                                
                                     @error('images')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Product Details</label>
                                <input value="{{old('productDetails')}}" type="text"
                                        name="productDetails" class="form-control w-100" id="exampleFormControlInput1">
                                
                                    @error('productDetails')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" hidden name="sellerName" value="{{ session('name') }}">
                                <input type="text" hidden name="sellerNumber" value="{{ session('phone') }}">
                                @if (session('role')=='vendor')
                                <input type="text" hidden name="vendorId" value="{{ session('id') }}">
                                @else
                                <input type="text" hidden name="sellerId" value="{{ session('id') }}">
                                @endif
                                <input type="text" hidden name="role" value="{{ session('role') }}">
                            </div>
                            
                            
                            <div class="mx-3">
                                    <input type="submit" value="Publish Now" class="btn btn-primary btn-sm mt-3">    
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</body>
@endsection

</html>