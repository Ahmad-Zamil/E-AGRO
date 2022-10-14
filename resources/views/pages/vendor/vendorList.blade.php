<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor List</title>
    <style>
        body { max-width: 100%; overflow-x: hidden; }
    </style>
</head>

@extends('../../layouts.app')
@section('content')
<div class="row">
    <div class="col-3"  style="min-height: 88vh; background-image: linear-gradient(45deg,  #000000,#25C618)">
        @if(session('role') == 'admin')
        @include('pages.admin.adminSideBar')
        @endif
    </div>
    <div class="col-9">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 88vh;  width: 100%;
       ">
            <div>
                {{-- update message --}}
                @if(session('vendor-update'))
                <div class="alert alert-warning w-100 text-center" role="alert">
                    <span class="fw-bold"> {{ session('vendor-update') }}</span>
                </div>
                @endif
                {{-- delete message --}}
                @if(session('vendor-delete'))
                <div class="alert alert-danger font-weight-bold w-100 text-center" role="alert">
                    <span class="fw-bold">
                        {{ session('vendor-delete') }}
                    </span>
                </div>
                @endif
                @if(session('vendor-approved'))
                <div class="alert alert-danger font-weight-bold w-100 text-center" role="alert">
                    <span class="fw-bold">
                        {{ session('vendor-approved') }}
                    </span>
                </div>
                @endif
                <h4 class="my-4 fw-bold  text-uppercase">Vendor List</h4>
                <table class="table table-borded table-striped table-hover">
                    <tr class="text-center">
                        <th class="">Id</th>
                        <th class="">Name</th>
                        <th class="">Email</th>
                        <th class="">Address</th>
                        <th class="">Phone</th>
                        {{-- <th class="px-4">Password</th> --}}
                        <th class="px-4">Status</th>
                        <th class="px-4">Action</th>
                    </tr>
                    @foreach($allVendors as $vendor)
                    <tr class="text-center ">
                        <td class="">{{$vendor->id}}</td>
                        <td class="">{{$vendor->name}}</td>
                        <td class="">{{$vendor->email}}</td>
                        <td class="">{{$vendor->address}}</td>
                        <td class="">{{$vendor->phone}}</td>
                        {{-- <td class="px-4">{{$seller->password}}</td> --}}
                        @if($vendor->status == 'Pending')
                        <td class="">
                            <span class="fw-bold" style="color: red;">{{$vendor->status}}</span>
                        </td>
                        @else
                        <td class="">
                            <span class="fw-bold">{{$vendor->status}}</span>
                        </td>
                        @endif
                        <td class="">
                            <a class="btn  btn-warning btn-sm" href={{"updateVendorStatus/".$vendor->id }}>Status</a>
                            <a class="btn  btn-success btn-sm" href={{ "vendorOrders/".$vendor->id }}>Products</a>
                            <a class="btn btn-primary btn-sm" href={{ "editVendor/".$vendor->id }}>Update</a>
                            <a type = "submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href={{ "deleteCustomer/".$vendor->id }}>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a class="btn btn-primary btn-sm mb-3 px-3" href="{{route('addVendor')}}">Add</a>
                <a class="btn btn-success btn-sm mb-3 px-3" href="{{route('adminDashboard')}}">Home</a>
            </div>
        </div>
    </div>
</div>

@endsection

</html>