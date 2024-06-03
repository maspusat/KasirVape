<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage as Storange;


class HomeController extends Controller
{
    public function index(Request $request){

        $ini_data = new User;

        if($request->get('cari')){
            $ini_data = $ini_data->where('name','like','%'.$request->get('cari').'%')
            ->orWhere('email','like','%'.$request->get('cari').'%');
        }
        if($request->get('tanggal')){
            $ini_data = $ini_data->where('name','like','%'.$request->get('cari').'%')
            ->orWhere('email','like','%'.$request->get('cari').'%');
        }

        $ini_data = $ini_data->get();

        return view('index', compact('ini_data','request'));
    }

    

    // public function dashboard(){
    //     return view('dashboard');
    // }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validator = $request->validate([
            // 'photo'     => 'required|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email|unique:users',
            'name' => 'required|unique:users',
            'password' => 'required|min:5',
        ]);

        // if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // $photo = $request->file('photo');
        // $filename = date('Y-m-d').$photo->getClientOriginalName();
        // $path = 'photo-user/'.$filename;

        // Storange::disk('public')->put($path,file_get_contents($photo));

        // $ini_data['email']      = $request->email;
        // $ini_data['name']       = $request->name;
        // $ini_data['password']   = Hash::make($request->password);
        // $ini_data['image']      = $filename;

        User::create($validator);

        return redirect()->route('admin.user.index');
    }

    public function edit(Request $request, $id){
        $ini_data = User::find($id);
        return view('edit', compact('ini_data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'nullable',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $ini_data['email']      = $request->email;
        $ini_data['name']       = $request->name;
        
        if($request->password){
            $ini_data['password']   = Hash::make($request->password);
        }

        User::whereId($id)->update($ini_data);
        return redirect()->route('admin.user.index');
    }

    public function delete(Request $request, $id){
        $ini_data = User::find($id);

        if($ini_data){
            $ini_data->delete();
        }

        return redirect()->route('admin.user.index');
    }
}
