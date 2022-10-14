@if(session('role') == 'admin')
@include('pages.admin.adminDashboard')
@elseif(session('role') == 'seller')
@include('pages.seller.sellerDashboard')
@elseif(session('role') == 'customer')
@include('pages.customer.customerDashboard')
@elseif(session('role') == 'service')
@include('pages.serviceProvider.serviceProviderDashboard')
@elseif(session('role') == 'vendor')
@include('pages.vendor.vendorDashboard')
@else
@include('pages.login.login');
@endif