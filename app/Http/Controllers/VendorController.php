<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\vendorOrder;
use App\Models\Seller;
use App\Models\Customer;
use App\Http\Requests\StorevendorRequest;
use App\Http\Requests\UpdatevendorRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VendorController extends Controller
{
    public function vendorList()
    {
        $allVendors = Vendor::all();

        // if (session('role') == 'admin') {
        //     return view('pages.customer.customerList', ['allCustomers' => $allCustomers]);
        // } else
        //     return view('pages.error.error');
        return view('pages.vendor.vendorList', ['allVendors' => $allVendors]);
    }
    //vendor edit
    function approvedVendorEdit($id)
    {
        $Vendor = Vendor::find($id);
        return view('pages.vendor.updateVendorStatus', ['status' => $Vendor]);
    }
    //approved seller status by (admin)
    function approvedVendor(Request $request)
    {
        $this->validate(
            $request,
            [
                'status' => 'required'
            ],
        );
        $vendor = Vendor::find($request->id);
        $vendor->id = $request->id;
        $vendor->status = $request->status;
        $vendor->update();

        $request->session()->flash('vendor-approved', 'Vendor Status update!');
        return redirect('vendorList');
    }

    //pass value for addCustomer page
    public function allVendor()
    {
        $allVendors = Vendor::all();
        return view('pages.vendor.addVendor', ['allVendors' => $allVendors]);
    }

    // ADD customer
    public function listingVendor(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:4|max:20',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'address' => 'required',
                'status' => 'required',
                'role' => 'required',
                'password' => [
                    'required',
                    // 'string',
                    // 'min:10',             // must be at least 10 characters in length
                    // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                    // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    // 'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/' // must contain a special character

                ],
            ],
            [
                'phone.required' => 'Phone is required!',
                'phone.regex' => 'Invalid phone number!',
                'address.required' => 'Address is required!',
                'password.required' => 'Password is required!',
                'password.regex' => 'Invalid password formate!',
                'password.min' => 'Must contain 10 characters!',
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'name.min' => 'Insert more than 5 characters!',
                'name.max' => 'Insert less than 20 characters!',
                'role.required' => 'Select your user role!'
            ]
        );
        $email = $request->email;
        //duplicate email check
        $check = Vendor::where([
            ['email', '=', $email]

        ])->first();
        if ($check) {
            $request->session()->flash('database-error', 'Email already taken! use another one!');
            return redirect('addVendor');
        } else {
            $var = new Vendor();
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->role = $request->role;
            $var->status = $request->status;
            $var->save();
            $request->session()->flash('vendor-added', 'Vendor Added!');
            return redirect('addVendor');
        }
    }
    

    //display vendor all information for (vendor)
    public function showVendorProfile()
    {
        $vendor = Vendor::where('id', Session()->get('id'))->first();

        return view('pages.dashboard.dashboard')->with('vendor', $vendor);
    }

    // send data to editAdminProfile page for (admin)
    function EditVendorProfile($id)
    {
        $vendor = Vendor::find($id);
        return view('pages.vendor.editVendorProfile', ['vendor' => $vendor]);
    }
    // update admin information by (admin)
    function updateVendorProfile(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:4|max:20',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                'address' => 'required',
                'password' => [
                    'required',
                    // 'string',
                    // 'min:10',
                    // 'regex:/[a-z]/',
                    // 'regex:/[A-Z]/',
                    // 'regex:/[0-9]/',
                    // 'regex:/[@$!%*#?&]/'
                ],
            ],
            [
                'phone.required' => 'Phone is required!',
                'phone.regex' => 'Invalid phone number!',
                'address.required' => 'Address is required!',
                'password.required' => 'Password is required!',
                'password.regex' => 'Invalid password formate!',
                'password.min' => 'Must contain 10 characters!',
                'name.required' => 'Name is required!',
                'email.required' => 'Email is required!',
                'email.email' => 'Invalid email address!',
                'name.min' => 'Insert more than 5 characters!',
                'name.max' => 'Insert less than 20 characters!',
            ]
        );
        $email = $request->email;
        $check = Vendor::where([
            ['email', '=', $email]
        ])->first();

        $vendor = Vendor::where('id', session()->get('id'))->first();
        if ($vendor->email == $request->email) {
            $var = Vendor::find($request->id);
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->update();
            $request->session()->flash('vendor-info-update', 'Profile Update successfully!');
            return redirect('vendorDashboard');
        }
        if ($check) {
            $request->session()->flash('database-error', 'Email already taken! use another one!');
            return redirect('editVendorProfile/' . $request->id);
        } else {
            $var = Vendor::find($request->id);
            $var->name = $request->name;
            $var->email = $request->email;
            $var->phone = $request->phone;
            $var->address = $request->address;
            $var->password = $request->password;
            $var->update();
            $request->session()->flash('vendor-info-update', 'Profile Update successfully!');
            return redirect('vendorDashboard');
        }
    }
    //add admin profile image by (admin)
    public function addVendorPhoto(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required',
                'role' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'status' => 'required',
            ],
        );
        $var = Vendor::where('id', session()->get('id'))->first();
        $var->name = $request->name;
        $var->email = $request->email;
        $var->address = $request->address;
        $var->password = $request->password;
        $var->phone = $request->phone;
        $var->role = $request->role;
        $var->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/vendorProfile/', $fileName);
            $var->image =  $fileName;
        }
        $var->update();
        $request->session()->flash('image-added', 'Uploaded profile picture!');
        return redirect('vendorDashboard');
    }
    // send data to changeAdminImage page for change image by (admin)
    function changeVendorImage($id)
    {
        $vendor = Vendor::find($id);
        return view('pages.vendor.changeVendorImage', ['vendor' => $vendor]);
    }
    //change profile image for (admin)
    function updateVendorImage(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required',
                'role' => 'required',
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'status' => 'required'
            ],
        );
        $var = Vendor::find($request->id);
        $var->name = $request->name;
        $var->email = $request->email;
        $var->address = $request->address;
        $var->password = $request->password;
        $var->phone = $request->phone;
        $var->role = $request->role;
        $var->status = $request->status;

        if ($request->hasFile('image')) {
            $destination = 'uploads/vendorProfile/' . $var->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/vendorProfile/', $fileName);
            $var->image =  $fileName;
        }
        $var->update();
        $request->session()->flash('image-update', 'Image changed successfully!');
        return redirect('vendorDashboard');
    }
     //show every single customer all orders
    public function vendorOrders($id)
    {
        $vendors = Vendor::find($id);
        $vendor = Vendor::where('id', $vendors->id)->first();
        $vendorOrders =  $vendor->orders; // function 
        // return $vendorOrders;
        return view('pages.vendor.vendorOrders')->with(['vendor' => $vendors, 'orders' => $vendorOrders]);
    }

   
    public function vendorP_rating($id)
    {
        $vendors = Vendor::find($id);
        $vendor = Vendor::where('id', $vendors->id)->first();
        $vendorP_ratings =  $vendor->p_ratings; // function 
        return view('pages.rating.vendorsAll_P_rating')->with(['vendor' => $vendors, 'ratings' => $vendorP_ratings]);
    }
    public function customerS_rating($id)
    {
        $customers = Customer::find($id);
        $customer = Customer::where('id', $customers->id)->first();
        $customerS_ratings =  $customer->s_ratings; // function 
        return view('pages.rating.customersAll_S_rating')->with(['customer' => $customers, 'ratings' => $customerS_ratings]);
    }
}
