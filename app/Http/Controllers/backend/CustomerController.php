<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function list() {

        //return view('backend.pages.customerList');
        $Customers = Customer::paginate(4);
        return view('backend.pages.customer.customerList', compact('Customers'));
    }

    public function createForm()
    {
        return view('backend.pages.customer.customerCreateForm');
    }

    //Create

    public function submitForm(Request $request)
    {
        //validation
        $request->validate([

            'name' => 'required',
            'image' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        // dd($fileName);

        Customer::create([
            'name' => $request->name,
            'image' => $fileName,
            'email' => $request->email,
            'password' => bcrypt($request['password']),

        ]);
        return redirect()->route('customer.list')->with('message', 'Customer Created Successfully.');
    }

    //update

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'image' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        $updateCustomer = Customer::find($id);

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        // dd($fileName);

        $updateCustomer->update([
            'name' => $request->name,
            'image' => $fileName,
            'email' => $request->email,
            'password' => bcrypt($request['password']),

        ]);
        return redirect()->route('customer.list')->with('message', 'Customer Updated Successfully');
    }

    public function editCustomer($id)
    {
        $Customer = Customer::find($id);
        return view('backend.pages.customer.customerEdit', compact('Customer'));
    }

    public function viewCustomer($id)
    {

        $Customer = Customer::find($id);
        return view('backend.pages.customer.customerView', compact('Customer'));
    }

    public function deleteCustomer($id)
    {
        $Customer = Customer::find($id)->delete();
        return redirect()->back();
    }
}
