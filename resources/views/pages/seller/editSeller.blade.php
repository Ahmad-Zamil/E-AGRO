<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Seller</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    @extends('../../layouts.app')
    @section('content')
    <div class="d-flex justify-content-center align-items-center" style="
    
    width: 100%;
    background-image: linear-gradient(45deg,  #000000,#25C618);
    ">
        <div>
            <div class="form-area">
                <div class="py-4" style=" 
                    /* border:2px solid white; */
                    border-radius: 10px;
                    width: 1000px;
                    min-height: 90vh;
                    color: white;
                ">
                    {{-- <form action="{{route('addSeller')}}" method="post" enctype="multipart/form-data"> --}}
                    <form action="{{route('updateSeller')}}" method="post">
                        {{csrf_field()}}

                        <table class="mb-4">
                            <tr>
                                <td>
                                    <h4 class="fw-bold mt-5">Update {{ $sellers->name }}'s Information</h4>
                                </td>

                            </tr>
                        </table>
                        <table>
                            <tr hidden>
                                <td>Id</td>
                                <td> <input type="text" name="id" value={{ $sellers->id }}></td>
                            </tr>
                            <tr>
                                <td><label class="pr-3">Name</label></td>
                                <td class="pr-3 py-2" style="width:400px;"><input type="text" value={{ $sellers->name }}
                                        name="name" class="form-control">
                                </td>
                                <td >
                                    <div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr hidden>
                                <td><label class="pr-3">Role</label></td>
                                <td class="pr-3 py-2"><select type="input" value={{ $sellers->role }} name="role"
                                        class="form-control">
                                        <option value="seller">Seller</option>
                                    </select>
                                </td>
                                <td>
                                    <div>
                                        @error('role')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td > <label class="pr-3">Email</label></td>
                                <td class="pr-3 py-2"><input value={{ $sellers->email }} type="text" name="email"
                                        class="form-control">
                                </td>
                                <td>
                                    <div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        @if(session('database-error'))
                                        <span class="text-danger"> {{ session('database-error') }}</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pr-3">Address</label></td>
                                <td class="pr-3 py-2"><input style="width:400px;" value={{ $sellers->address }} type="text" name="address"
                                        class="form-control"></td>
                                <td>
                                    <div>
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pr-3">Phone</label></td>
                                <td class="pr-3 py-2"><input value={{ $sellers->phone }} type="text" name="phone"
                                        class="form-control">
                                </td>
                                <td>
                                    <div>
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pr-3">Password</label></td>
                                <td class="pr-3 py-2"><input value={{ $sellers->password }} type="password"
                                        name="password" class="form-control"></td>
                                <td>
                                    <div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="pr-3">Status</label></td>
                                <td class="pr-3 py-2"><select value={{ $sellers->status }} name="status"
                                        class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                    </select></td>
                                <td>
                                    <div>
                                        @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex">
                            <a href={{route('sellerList')}} class="btn btn-danger btn-sm mt-3 px-3">Back</a>
                            <div class="mx-3">
                                <input type="submit" value="Update" class="btn btn-primary btn-sm mt-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>
@endsection

</html>