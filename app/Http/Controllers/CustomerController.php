<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function tampilcus(Request $request)
    {
        $customers = new Customer;
        if($request->get('cari')){
            $customers = $customers->where('name','like','%'.$request->get('cari').'%')
            ->orWhere('email','like','%'.$request->get('cari').'%');
        }
        if($request->get('tanggal')){
            $customers = $customers->where('name','like','%'.$request->get('cari').'%')
            ->orWhere('email','like','%'.$request->get('cari').'%');
        }

        $customers = $customers->get();
        return view('customer.cusindex', compact('customers','request'));
    }

    public function store(Request $request){
        $validator = $request->validate([
            'nik' => 'required|min:16',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create($validator);
        return redirect()->route('admin.cus.index');
    }

    public function create()
    {
        return view('customer.cuscreate');
    }

    public function edit(Request $request, $id){
        $customers = Customer::find($id);
        return view('customer.cusedit', compact('customers'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nik' => 'required|min:16',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $customers = Customer::find($id);
        $customers->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    
        return redirect()->route('admin.cus.index');
    }
        

    public function delete(Request $request, $id){
        $customer = Customer::find($id);
    
        if($customer){
            $customer->delete();
        }
    
        return redirect()->route('admin.cus.index');
    }
    
}
