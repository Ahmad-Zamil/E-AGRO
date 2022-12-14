<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Dashboard</title>

    <style>
        body {
            max-width: 100%;
            overflow-x: hidden;
        }
        .custom
        {
            background-color:#25C618!important;
            font-weight: 700!important;
        }
    </style>
</head>

<body>
    @extends('../../layouts.app')
    @section('content')
    <div class="row">


        <div class="col-3" style="min-height: 88vh; background-image: linear-gradient(45deg,  #000000,#25C618)">
        <div class="py-5">
    <div class="text-center">
        <a style="text-align: left" class="btn btn-warning my-2 w-75 fw-bold"
            href="{{ route ('customerDashboard') }}"><i class="fas fa-user-circle px-2 me-2"></i>{{ session('name')
            }}</a>
    </div>
    <div class="text-center">
        <a class="btn custom my-2 w-75" style="text-align: left"
            href="{{ route ('customerDashboard') }}"><i class="fas fa-bars px-2 me-2"></i>My Profile</a>
            
    </div>
    <div class="text-center">
        <a class="btn custom my-2 w-75" style="text-align: left" href={{ "/customerOrders/" .session('id') }}><i
                class="fas fa-bars px-2 me-2"></i>My order</a>
    </div>
    <div class="text-center">
        <a class="btn custom my-2 w-75" href={{ '/productReviews/' .session('id') }} style="text-align: left"><i
                class="fas fa-bars me-2 px-2"></i>Product Review</a>
    </div>
    <!-- <div class="text-center">
        <a class="btn custom my-2 w-75"href={{ '/customerDeliveries'}} style="text-align: left"><i class="fas fa-bars  px-2 me-2"></i>Product Delivery</a>
    </div>
    <div class="text-center">
        <a class="btn custom my-2 w-75" style="text-align: left" href={{ '/serviceReviews/' .session('id') }}><i class="fas fa-bars  px-2 me-2"></i>Service Review</a>
    </div> -->
    
    <div class="text-center">
        <a class="btn custom my-2 w-75" style="text-align: left" href="{{ route ('back.products') }}"><i
                class="fas fa-bars me-2 px-2 "></i>All Product</a>
    </div>
    <!-- <div class="text-center">
        <a class="btn btn-danger fw-bold my-2 w-75" style="text-align: left" href="{{ route ('logout') }}"><i
                class="fas fa-sign-out-alt me-2 px-2"></i>Logout</a>
    </div> -->
    <div class="text-center">
        <a class="btn btn-danger fw-bold my-2 w-75" style="text-align: left" href="{{ route('show.cart', $customer->id) }}"><i
                class="fas fa-sign-out-alt me-2 px-2"></i>My Cart</a>
    </div>
    
</div>
        </div>


        <div class="col-9">
            {{-- message --}}
            <div class="text-center">
                @if(session('image-added'))
                <div class="mt-3 fw-bold d-flex justify-content-center align-items-center"
                    style="height: 30px; font-size:13px; color:red; padding:10px; width:100%; background: black; border-radius: 20px">
                    {{ session('image-added') }}
                </div>
                @endif
                @if(session('image-update'))
                <div class="mt-3 fw-bold d-flex justify-content-center align-items-center"
                    style="height: 30px; padding:10px;font-size:13px; width:100%;color:red; background:black; border-radius: 20px">
                    {{ session('image-update') }}
                </div>
                @endif
                @if(session('customer-info-update'))
                <div class="mt-3 fw-bold d-flex justify-content-center align-items-center"
                    style="height: 30px; font-size:13px; color:red; padding:10px; width:100%; background: black; border-radius: 20px">
                    {{ session('customer-info-update') }}
                </div>
                @endif
            </div>
            <div class="row" style="height: 90vh;" align="center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
                        <div class="p-5"
                        style="border-radius: 10px; background: #198754; height: 400px;width:430px ;box-shadow: 3px 3px 10px gray;">
                            <h4 class="mb-5 fw-bold text-white bg-dark text-uppercase">Profile Picture</h4>
                            <img src="{{ asset('uploads/customerProfile/'.$customer->image) }}"
                                alt="{{ $customer->name }}" width="130px" height="160px">
                            @if($customer->image == '')
                            <form action="{{route('customerDashboard')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="file" name="image" class="form-control w-100">
                                <div>
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <input type="text" hidden name="id" value="{{ $customer->id }}">
                                <input type="text" hidden name="name" value="{{ $customer->name }}">
                                <input type="text" hidden name="role" value="{{ $customer->role }}">
                                <input type="text" hidden name="email" value="{{ $customer->email }}">
                                <input type="text" hidden name="password" value="{{ $customer->password }}">
                                <input type="text" hidden name="address" value="{{ $customer->address }}">
                                <input type="text" hidden name="phone" value="{{ $customer->phone }}">
                                <input type="text" hidden name="status" value="{{ $customer->status }}">
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Set Photo</button>
                            </form>
                            @else
                            <br>
                            <h5 class="fw-bold mt-2">{{ $customer->name }}</h5>
                            <a href="{{ 'changeCustomerImage/'.$customer->id }}"
                                class="btn btn-danger btn-sm mt-3">Change
                                Photo</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 90vh;">
                        <div class="p-5"
                        style="border-radius: 10px; background: #198754; height: 400px; width:430px; box-shadow: 3px 3px 10px gray;">
                            <h4 class="mb-5 fw-bold text-white bg-dark text-uppercase">Customer Information</h4>
                            <div class="h5 fw-bold my-3 form-control">
                                Name : {{ $customer->name }}
                            </div>
                            <div class="h5 fw-bold  my-3 form-control">
                                Email : {{ $customer->email }}
                            </div>
                            <div class="h5 fw-bold  my-3 form-control">
                                Phone : {{ $customer->phone }}
                            </div>
                            <div class="h5 fw-bold  my-3 form-control">
                                Address : {{ $customer->address }}
                            </div>
                            <div>
                                <a href={{ "editCustomerProfile/" .$customer->id}} class="btn btn-warning btn-sm">Edit
                                    Profile</a>

                                {{-- Delete account --}}
                                <button style="margin-left: 130px" type="button" class="btn btn-danger btn-sm"
                                    data-toggle="modal" data-target="#exampleModal">
                                    Delete Account
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Acount Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                               <span class=" fw-bold text-danger"> Are You Sure ?</span>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger btn-sm" href={{ "deleteCustomerAccount/"
                                                    .$customer->id }}>Delete Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end delete account --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
</body>

</html>