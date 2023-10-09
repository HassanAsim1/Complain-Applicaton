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
    public function delete_user()
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

    
}
