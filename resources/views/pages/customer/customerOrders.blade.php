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
            @if(session('role') == 'admin')
            @include('pages.admin.adminSideBar')
            @elseif(session('role') == 'customer')
            @include('pages.customer.customerSideBar')
            @elseif(session('role') == 'vendor')
            @include('pages.vendor.vendorSideBar')
            @endif
        </div>
    </div>
    @if(session('role') == 'customer')
    <div class="col-9">
        <div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh; width: 100%">
                <div>
                    @if(session('rating-done'))
                    <div class="alert alert-warning w-100 text-center" role="alert">
                        <span class="fw-bold"> {{ session('rating-done') }}</span>
                    </div>
                    @endif
                    {{-- update message --}}
                    @if(session('order-update'))
                    <div class="alert alert-warning w-100 text-center" role="alert">
                        <span class="fw-bold"> {{ session('order-update') }}</span>
                    </div>
                    @endif
                    {{-- delete message --}}
                    @if(session('order-delete'))
                    <div class="alert alert-danger font-weight-bold w-100 text-center" role="alert">
                        <span class="fw-bold">
                            {{ session('order-delete') }}
                        </span>
                    </div>
                    @endif
                    @if(session('order-done'))
                    <div class="alert alert-success font-weight-bold w-100 text-center" role="alert">
                        <span class="fw-bold">
                            {{ session('order-done') }}
                        </span>
                    </div>
                    @endif
                    <h4 class="my-4 fw-bold text-uppercase"> <span class="text-danger">{{ $customer->name }}'s</span> All Orders</h4>
                    <table class="table table-borded table-striped table-hover">
                        <tr class="text-center">
                            <th>Order Id</th>
                            <th>Order From Id</th>
                            <th>Order From Role</th>
                            <th>Product Name</th>
                            <th>Product Id</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Review</th>
                        </tr>
                        @foreach ($orders as $order)
                        @if($order->role == "customer" && $order->orderfromrole == "seller" || $order->orderfromrole == "vendor")
                        
                        <tr class="text-center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->orderfromid }}</td>
                            <td>{{ $order->orderfromrole }}</td>
                            <td>{{ $order->productName }}</td>
                            <td>{{ $order->productId }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                @if($order->delivery_status == 'Pending')
                                <span class="text-danger fw-bold">{{$order->delivery_status}}</span>
                                @elseif($order->delivery_status == 'Accept')
                                <span class="text-success fw-bold">{{$order->delivery_status}}</span>
                                @elseif($order->delivery_status == 'Going')
                                <span class="text-primary fw-bold">{{$order->delivery_status}}</span>
                                @else
                                <span class="text-black fw-bold">{{$order->delivery_status}}</span>
                                @endif
                            </td>

                            <td>
                                <a class="btn  btn-info btn-sm" href={{ '/productRating/' .$order->productId
                                    }}>P_Review</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                       
                    </table>
                    <a href={{('/productReviews/'.session('id'))}} class="btn btn-primary btn-sm mt-3">P_Review</a>
                    <a href={{route('customerDashboard')}} class="btn btn-success btn-sm mt-3 px-3">Home</a>
                </div>
            </div>
        </div>
    </div>
    @elseif (session('role') == 'admin')
    {{-- for admin view --}}
    <div class="col-9">
        <div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh; width: 100%">
                <div>
                   
                    <h4 class="my-4 fw-bold text-uppercase"> <span class="text-danger">{{ $customer->name }}'s</span> All Orders</h4>
                    <table class="table table-borded table-striped table-hover">
                        <tr class="text-center">
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr class="text-center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->productName }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->method }}</td>
                            <td>
                                @if($order->status == 'Pending')
                                <span class="text-danger fw-bold">{{$order->status}}</span>
                                @elseif($order->status == 'Accept')
                                <span class="text-success fw-bold">{{$order->status}}</span>
                                @elseif($order->status == 'Going')
                                <span class="text-primary fw-bold">{{$order->status}}</span>
                                @else
                                <span class="text-black fw-bold">{{$order->status}}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <a  class="btn btn-primary btn-sm mt-3" href={{ route('orderList') }}>All Orders</a>
                    <a  class="btn btn-success btn-sm mt-3" href={{ route('adminDashboard') }}>Home</a>
                    <a href={{route('customerList')}} class="btn btn-danger btn-sm mt-3 px-3">back</a>
                </div>
            </div>
        </div>
    </div>
    @elseif (session('role') == 'vendor')

    {{-- for vendor view --}}
    <div class="col-9">
        <div>
            <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh; width: 100%">
                <div>
                   
                    <h4 class="my-4 fw-bold text-uppercase"> <span class="text-danger"></span> All Orders</h4>
                    <table class="table table-borded table-striped table-hover">
                        <tr class="text-center">
                            <th>Order Id</th>
                            <th>Order From Role</th>
                            <th>Order From Id</th>
                            <th>Role</th>
                            <th> Name</th>
                            <th>Product Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>Method</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($q as $order)
                        @if( $order->orderfromrole == "vendor")
                        <tr class="text-center">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->orderfromrole }}</td>
                            <td>{{ $order->orderfromid }}</td>
                            <td>{{ $order->role }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->productName }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                @if($order->delivery_status == 'Pending')
                                <span class="text-danger fw-bold">{{$order->delivery_status}}</span>
                                @elseif($order->delivery_status == 'Accept')
                                <span class="text-success fw-bold">{{$order->delivery_status}}</span>
                                @elseif($order->delivery_status == 'Going')
                                <span class="text-primary fw-bold">{{$order->delivery_status}}</span>
                                @else
                                <span class="text-black fw-bold">{{$order->delivery_status}}</span>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <a  class="btn btn-primary btn-sm mt-3" href={{ route('orderList') }}>All Orders</a>
                    <a  class="btn btn-success btn-sm mt-3" href={{ route('adminDashboard') }}>Home</a>
                    <a href={{route('customerList')}} class="btn btn-danger btn-sm mt-3 px-3">back</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection

</html>