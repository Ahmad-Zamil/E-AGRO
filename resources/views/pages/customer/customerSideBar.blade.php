<style>
.custom
{
    background-color:#25C618;
    font-weight: 700;
}
</style>
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
    </div> -->
    <!-- <div class="text-center">
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
    <!-- <div class="text-center">
        <a class="btn btn-danger fw-bold my-2 w-75" style="text-align: left" href="{{ route ('logout') }}"><i
                class="fas fa-sign-out-alt me-2 px-2"></i>Logout</a>
    </div> -->
    
    
</div>