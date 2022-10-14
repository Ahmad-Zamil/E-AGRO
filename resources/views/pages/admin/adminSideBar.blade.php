<style>
.custom
{
    background-color:#25C618;
    font-weight: 700;
}
</style>
<div class="px-2 py-5">
    <div class="text-center">
        <a style="text-align: left" class="btn btn-warning my-2 w-75 fw-bold" href="{{ route ('adminDashboard') }}"><i
                class="fas fa-user-circle px-2 me-2"></i>{{ session('name')
            }}</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('adminDashboard') }}"><i
                class="fas fa-bars me-2 px-2"></i>My Profile</a>
    </div>
    <!-- <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('sellerList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Farmer List</a>
    </div> -->
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route('FtoC.Orderlist') }}"><i
                class="fas fa-bars me-2 px-2"></i>F to C Order List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route('FtoV.Orderlist') }}"><i
                class="fas fa-bars me-2 px-2"></i>F to V Order List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route('VtoC.Orderlist') }}"><i
                class="fas fa-bars me-2 px-2"></i>V to C Order List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('productList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Product List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('sellerList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Farmer List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('customerList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Customer List</a>
    </div>
    <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('vendorList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Vendor List</a>
    </div>
    <!-- <div class="text-center">
        <a style="text-align: left; color:#FFFFFF;" class="btn custom my-2 w-75" href="{{ route ('serviceProviderList') }}"><i
                class="fas fa-bars me-2 px-2"></i>Service Provider List</a>
    </div> -->
 
</div>
