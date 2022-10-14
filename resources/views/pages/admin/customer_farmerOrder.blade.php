<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order List</title>
    <style>
        body {
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
</head>

@extends('../../layouts.app')
@section('content')
<div class="row">
    <div class="col-3" style="min-height: 88vh; background-image: linear-gradient(45deg,  #000000,#25C618)">
        @if(session('role') == 'admin')
        @include('pages.admin.adminSideBar')
        @elseif (session('role') == 'customer')
        @include('pages.customerProvider.customerProviderSideBar')
        @endif
    </div>
    <div class="col-9">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh;  width: 100%;
       ">
            <div>


                <h4 class="my-4 fw-bold  text-uppercase">Order List</h4>
                <table class="table table-borded table-striped table-hover">
                    <tr class="text-center">
                        <th>Product Name</th>
                        <th>Order From Id</th>
                        <th>Order From Role</th>
                        <th>Role</th>
                        <th>Customer Name</th>
                        <!-- <th>Address</th> -->
                        <th>Phone</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Method</th>
                        @if(session('role') == 'service')
                        <th>Action</th>
                        @endif
                    </tr>
                    @foreach($orders as $order)
                    @if($order->role == "customer" && $order->orderfromrole == "seller")
                    <tr class="text-center ">
                        <td>{{$order->productName}}</td>
                        <td>{{$order->orderfromid}}</td>
                        <td>{{$order->orderfromrole}}</td>
                        <td>{{$order->role}}</td>
                        <td>{{$order->name}}</td>
                        <!-- <td>{{$order->address}}</td> -->
                        <td>{{$order->phone}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            @if($order->delivery_status == "Processing")
                            <span class="text-danger fw-bold">{{$order->delivery_status}}</span>
                            @elseif($order->delivery_status == 'Accept')
                            <span class="text-success fw-bold">{{$order->delivery_status}}</span>
                            @elseif($order->delivery_status == 'Going')
                            <span class="text-primary fw-bold">{{$order->delivery_status}}</span>
                            @else
                            <span class="text-black fw-bold">{{$order->delivery_status}}</span>
                            @endif
                        </td>
                        <td>{{$order->payment_status}}</td>
                        @if(session('role') == 'service')
                        <td>
                            @if($order->status == 'Pending')
                            <a style="pointer-events: none; " class="btn btn-warning btn-sm"
                                href={{ "/updateOrderStatus/" .$order->id }}>Update</a>
                            <a style="pointer-events: none; " class="btn btn-primary btn-sm" href={{ "/addToDelivery/"
                                .$order->id }}>Add Delivery</a>
                            @elseif($order->status == 'Accept')
                            <a class="btn btn-warning btn-sm" href={{ "/updateOrderStatus/" .$order->id }}>Update</a>
                            <a style="pointer-events: none; " class="btn btn-primary btn-sm" href={{ "/addToDelivery/"
                                .$order->id }}>Add Delivery</a>
                            @elseif($order->status == 'Going')
                            <a class="btn btn-warning btn-sm" href={{ "/updateOrderStatus/" .$order->id }}>Update</a>
                            <a style="pointer-events: none; " class="btn btn-primary btn-sm" href={{ "/addToDelivery/"
                                .$order->id }}>Add Delivery</a>
                            @else
                            <a class="btn btn-warning btn-sm" href={{ "/updateOrderStatus/" .$order->id }}>Update</a>
                            <a class="btn btn-primary btn-sm" href={{ "/addToDelivery/" .$order->id }}>Add Delivery</a>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </table>
                <a class="btn btn-primary btn-sm mb-3 px-3" href="{{route('adminDashboard')}}">Home</a>
            </div>
        </div>
    </div>
</div>

@endsection

</html>