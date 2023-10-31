<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;

class admincontroller extends Controller
{
    public function add_user()
    {
        return view('admin.complain.adduser');
    }
    public function delete_user($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }
    public function view_user()
    {
        $data = User::all();
        return view('admin.complain.view_user', compact('data'));
    }
    public function editUser(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('admin.complain.editUser',compact('user'));
    }
    public function editUserData(Request $request){
        try {
            $data = User::where('id', auth()->user()->id)->first();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
            
            return redirect()->back()->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user.');
        }        
    }
    
}
