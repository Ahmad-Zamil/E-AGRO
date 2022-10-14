<div style="margin-bottom:88px;">
    <nav class="row fixed-top">
        <div class="col-12">
            <div class="bg-white">
                <div class="container d-flex">
                    <div class="d-flex ">
                        
                        
                    
                    <div class="login-info ms-auto">
                        @if(session()->has('name'))
                        @if(session('role')=== 'admin')
                        <span class="fw-bold text-danger"><i class="fas fa-user-circle px-1"></i>Admin : {{
                            session('name') }}</span>
                        @elseif(session('role')== 'seller')
                        <span class="fw-bold" style="color: red;"><i class="fas fa-user-circle px-1"></i>Seller : {{
                            session('name') }}</span>

                        @elseif(session('role')== 'customer')
                        <span class="fw-bold text-danger"><i class="fas fa-user-circle px-1"></i>Customer : {{
                            session('name') }}</span>

                        @elseif(session('role')== 'service')
                        <span class="fw-bold text-danger"><i class="fas fa-user-circle px-1"></i>Service : {{
                            session('name') }}</span>

                        @elseif(session('role')== 'vendor')
                        <span class="fw-bold text-danger"><i class="fas fa-user-circle px-1"></i>Vendor : {{
                            session('name') }}</span>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 navbar navbar-expand-lg" style="background: #FFFFFF ;">
            <div class="container py-1 px-5" style="background: #24AD1F; border-radius: 30px">
                {{-- <h5 class="fw-bold text-white"></h5> --}}


                <div class="brandFont text-white pt-1 d-flex justify-content-center align-items-center px-2 font-weight-bold"
                    style="border:2px solid red;">
                    <h5 class="fw-bold" style="color: rgb(59, 253, 0); font-weight: bold">
                        <span>
                            
                    </h5>
                    <h5 class="fw-bold">E-AGRO</h5>
                    <h5 class="fw-bold" style="color: rgb(59, 253, 0); font-weight: bold"><span></span></h5>
                </div>
                <div class="navbar-nav ms-auto text-uppercase">
                    <a class="fw-bold nav-link mx-2 text-white" href="{{ route ('/') }}">Home</a>
                    <a class="fw-bold nav-link mx-2 text-white" href="{{ route('products') }}">Products</a>

                    <div class="dropdown show">
                        <a class="fw-bold nav-link mx-2 text-white dropdown-toggle" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                    </div>











                    <a class="fw-bold nav-link mx-2 text-white" href="">About Us</a>
                    <a class="fw-bold nav-link mx-2 text-white" href="">Contact Us</a>
                    @if(session('role')=='admin')
                    <a class="fw-bold nav-link mx-2  text-white" href="{{ route ('adminDashboard') }}">Dashboard</a>
                    @elseif(session('role')=='vendor')
                    <a class="fw-bold nav-link mx-2  text-white" href="{{ route ('vendorDashboard') }}">Dashboard</a>
                    @elseif(session('role')=='customer')
                    <a class="fw-bold nav-link mx-2  text-white" href="{{ route ('customerDashboard') }}">Dashboard</a>
                    
                    
                    @elseif(session('role')=='service')
                    <a class="fw-bold nav-link mx-2  text-white"
                        href="{{ route ('serviceProviderDashboard') }}">Dashboard</a>
                    @elseif(session('role') == 'seller')
                    <a class="fw-bold nav-link mx-2  text-white" href="{{ route ('sellerDashboard') }}">Dashboard</a>
                    @else

                    @endif

                    @if(session()->has('email'))
                    <div>
                        <a style="color: yellow" class="fw-bold nav-link mx-2" href="{{ route ('logout') }}">Logout <i
                                class="fas fa-sign-out-alt px-1"></i></a>
                    </div>
                    @else
                    <a class="fw-bold nav-link mx-2  text-white" href="{{ route ('login') }}">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>