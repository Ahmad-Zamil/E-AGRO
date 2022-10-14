<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addcart;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Neworder;

class OrderViewController extends Controller
{
    public function FtoC_Orderlist()
    {
        $p = 'customer';

            $orders = Neworder::where('role', '=', $p)->get();

            $customers = Customer::all();

            

            return view('pages.admin.customer_farmerOrder', compact('orders', 'customers'));

            // dd($data);

            // exit();
    }

    public function FtoV_Orderlist()
    {
        $p = 'vendor';

            $orders = Neworder::where('role', '=', $p)->get();

            $vendors = Vendor::all();

            

            return view('pages.admin.vendor_farmerOrder', compact('orders', 'vendors'));

            // dd($data);

            // exit();

    }

    public function VtoC_Orderlist()
    {
        if(session('role')=='admin'){
            $p= session('role') == 'customer';
            $orders = Neworder::where('role', '=', $p)->get();
            $customers = Customer::all();
            
            return view('pages.admin.vendor_customerorder', compact('orders', 'customers'));
            // dd($data);
            // exit();
        }

    }

    public function My_Orderlist(){
        
    }
}
