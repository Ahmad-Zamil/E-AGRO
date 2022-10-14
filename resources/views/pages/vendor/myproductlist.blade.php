<h4 class="my-4 fw-bold  text-uppercase">Product List</h4>
                    <table class="table table-borded table-striped table-hover">
                        <tr class="text-center">
                            <th>#Sl.</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                            @php $s = 0 @endphp
                        @foreach($allProducts as $product)
                            @if(session('id') == $product->sellerId)
                            <tr class="text-center">
                                <td>{{$s}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$product->image) }}" height="50px" width="50px"
                                        alt="img">
                                </td>
                                <td> <a class="btn  btn-primary btn-sm mt-3" href={{ "productOrders/" .$product->id
                                        }}>Orders</a>
                                    <a class="btn  btn-success btn-sm mt-3" href={{ "productRatings/" .$product->id
                                        }}>Reviews</a>
                                    <a class="btn  btn-warning btn-sm mt-3" href={{ "editProduct/" .$product->id
                                        }}>Update</a>
                                    <a class="btn btn-danger btn-sm mt-3" href={{ "deleteProduct/" .$product->id
                                        }}>Delete</a>
                                </td>
                            </tr>
                            @endif
                            @php $s++ @endphp
                        @endforeach
                    </table>

                    <a class="btn btn-primary btn-sm mb-3 px-3" href="{{route('addProduct')}}">Add</a>
                    <a class="btn btn-success btn-sm mb-3 px-3" href="{{route('vendorDashboard')}}">Home</a>