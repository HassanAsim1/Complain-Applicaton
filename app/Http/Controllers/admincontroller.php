<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            if(!empty($request->oldPassword) && !Hash::check($request->oldPassword, $data->password)){
                return redirect()->back()->with('error', 'Old Password not matched.');
            }
            // Check if the old password is provided and if it matches the current password
            if (!empty($request->oldPassword) && Hash::check($request->oldPassword, $data->password)) {
                $data->password = Hash::make($request->newPassword);
            }
            
            $data->save();
            
            return redirect()->back()->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user.');
        }       
    }
    public function assignDeveloper(Request $request){
        $data = complain::where('id',$request->complaintId)->first();
        $data->developer_id = $request->developerId;
        $data->save();

        return redirect()->back()->with('success', 'Developer Assigned Successfully');
    }
    
}
