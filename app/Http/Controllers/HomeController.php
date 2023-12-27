<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }

    public function index() {
        $users = User::count();
        $data = User::get();

        return view('users.index',compact('data','users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {

        $validator = validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name']     = $request->name;
        $data['email']    = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('users.index');
    } 

    public function edit(Request $request, $id) {
        $data = User::find($id);
        return view('users.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];
    
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        User::where('id', $id)->update($data);
    
        return redirect()->route('users.index');
    }
    
    public function delete(Request $request,$id) {
        $data = User::find($id);

        if($data) {
            $data->delete();
        }

        return redirect()->route('users.index');
    }
}