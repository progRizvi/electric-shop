<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    public function dManList()
    {
        $deliverymans = DeliveryMan::paginate(10);
        return view('backend.deliveryMan.dManList', compact('deliverymans'));
    }

    public function dManCreate()
    {
        return view('backend.deliveryMan.dManCreate');
    }

    //Create

    public function dManSubmit(Request $request)
    {

        $fileName = null;
        if ($request->hasFile('man_image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('man_image')->getClientOriginalExtension();
            $request->file('man_image')->storeAs('uploads/deliveryMan', $fileName);
        }

        // dd($fileName);

        DeliveryMan::create([
            'man_name' => $request->man_name,
            'man_email' => $request->man_email,
            'man_number' => $request->man_number,
            'man_image' => $fileName,
            'man_status' => $request->man_status,

        ]);
        return redirect()->route('delivery.man.list')->with('message', 'Delivery Man Created Successfully.');
    }

    public function dManEdit($id)
    {
        $deliveryman = DeliveryMan::find($id);
        return view('backend.deliveryMan.dManEdit', compact('deliveryman'));
    }

    public function dManUpdate(Request $request, $id)
    {

        $updateman = DeliveryMan::find($id);
        $fileName = null;
        if ($request->hasFile('man_image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('man_image')->getClientOriginalExtension();
            $request->file('man_image')->storeAs('uploads/deliveryMan', $fileName);
        }

        // dd($fileName);

        $updateman->update([
            'man_name' => $request->man_name,
            'man_email' => $request->man_email,
            'man_number' => $request->man_number,
            'man_image' => $fileName,
            'man_status' => $request->man_status,

        ]);

        return redirect()->route('delivery.man.list')->with('message', 'Delivery Man Updated Successfully.');
    }

    public function dManDelete($id)
    {
        $deliveryman = DeliveryMan::find($id)->delete();
        toastr()->warning('Delete!', 'Delivery Man Delete Successfully.');
        return redirect()->route('delivery.man.list');
    }
}
