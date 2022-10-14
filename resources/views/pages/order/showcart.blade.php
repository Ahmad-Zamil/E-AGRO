<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Order List</title>
    <style>
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        th,
        td {
            font-size: 15px;
        }
    </style>
</head>

@extends('../../layouts.app')
@section('content')
<div class="row">
    <div class="col-3" style="background-image: linear-gradient(45deg,  #000000,#25C618)">
        <div>
            @if(session('role') == 'vendor')
            @include('pages.vendor.vendorSideBar')
            @elseif(session('role') == 'customer')
            @include('pages.customer.customerSideBar')
            @endif
        </div>
    </div>
    @if(session('role') == 'customer')
    <div class="col-9">
        <div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh; width: 100%">
                <div>    
                    <h4 class="my-4 fw-bold text-uppercase"> <span class="text-danger">{{ session('name') }}'s</span> All Cart</h4>
                    <div>
                        <table class="table table-borded table-striped table-hover">
                            <tr class="text-center">
                                
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            @php 
                            $total_price = 0;
                            @endphp
                            @foreach ($cart as $customer)
                            <tr class="text-center">
                                <td>{{$customer->productName}}</td>
                                <td>{{$customer->price}}</td>
                                <td>{{$customer->quantity}}</td>
                                <td>{{$customer->total_price}}</td>
                                <td>
                                <a class="btn btn-danger btn-sm" href="{{ route('remove.cart', $customer->id) }}">Remove</a>
                                </td>
                            </tr>
                            @php 
                            $total_price = $total_price + $customer->total_price
                            @endphp 
                            @endforeach

                            
                            
                            
                        </table>
                        <h4 class="text-center text-primary">Total Price: {{ $total_price}}</h4>
                    </div>
                    <div >
                            <h1 class="text-center" ">Procced To Order</h1>
                            <a class="btn btn-danger" href="{{ route('cash.order') }}">Cash On Delivery</a>
                            <a class="btn btn-danger" href="">Payment Getway</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(session('role') == 'vendor')
    {{-- for vendor view --}}
    <div class="col-9">
        <div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh; width: 100%">
                <div>
                   
                    <h4 class="my-4 fw-bold text-uppercase"> <span class="text-danger">{{ session('name') }}'s</span> All Orders</h4>
                    <table class="table table-borded table-striped table-hover">
                    <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @php 
                        $total_price = 0;
                        @endphp
                        @foreach ($cart as $vendor)
                        <tr class="text-center">
                            <td>{{$vendor->productName}}</td>
                            <td>{{$vendor->price}}</td>
                            <td>{{$vendor->quantity}}</td>
                            <td>{{$vendor->total_price}}</td>
                            <td>
                            <a class="btn btn-danger btn-sm" href="{{ route('remove.cart', $vendor->id) }}">Remove</a>
                            </td>
                        </tr>
                        @php 
                        $total_price = $total_price + $vendor->total_price
                        @endphp 
                        @endforeach
                    </table>
                    <div>
                        <h4 class="text-center text-primary">Total Price: {{ $total_price}}</h4>
                    </div>
                    <div >
                        <h1 class="text-center">Procced To Order</h1>
                        <a class="btn btn-danger" href="{{ route('cash.order') }}">Cash On Delivery</a>
                        <a class="btn btn-danger" href="">Payment Getway</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection

</html>