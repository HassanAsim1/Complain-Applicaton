<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;
use App\Mail\ComplaintSubmitted;

class complaincontroller extends Controller
{
    public function view_complain()
    {
        $data = complain :: all();
        return view('admin.complain.viewcomplain',['members'=>$data]);
    }


    public function complain_store(Request $request)
    {
         // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new Complain model instance and populate it with the form data
        $complain = new Complain();
        $complain->title = $request->input('title');
        $complain->description = $request->input('description');
        $complain->categories = $request->input('categories');
        $complain->status = $request->input('status');
        $complain->type = $request->input('type');
        if($request->input('id')){
            $complain->developer_id = $request->input('id');
        }
        
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complain_images', 'public');
            $complain->image = $imagePath;
        }

        // Save the Complain model to the database
        if($complain->save()){

            Mail::to('admintest@gmail.com')->send(new ComplaintSubmitted($complain));

            return redirect()->back()->with('success', 'Complaint Submitted Successfully');
        }
        else{
            return redirect()->back()->with('error', 'An error occurred while submitting the complaint');
        }
    }


    public function addcomplain()
    {
        $developer = User::where('role','developer')->get();
        return view('admin.complain.addcomplain',compact('developer'));
    }

    public function deletecomplain($id)
    {
        $data = Complain::find($id);
        $data->delete();
        return redirect()->back()->with('success','Complain Deleted Successfully');
    }
    public function complain()
    {
        $data = complain :: all();
        return view('admin.complain.complains',compact('data'));
    }

}
