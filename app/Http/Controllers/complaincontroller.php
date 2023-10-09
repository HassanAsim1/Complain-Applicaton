<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;
use App\Mail\ComplaintSubmitted;
use App\Models\Notification;

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
        try {
        
            $complain = new Complain();
            $complain->title = $request->input('title');
            $complain->description = $request->input('description');
            $complain->categories = $request->input('categories');
            $complain->status = $request->input('status');
            $complain->type = $request->input('type');
            
            if ($request->input('id')) {
                $complain->developer_id = $request->input('id');
            }
            
            // Handle image upload if provided
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('complain_images', 'public');
                $complain->image = $imagePath;
            }
        
            // Save the Complain model to the database
            $complain->save();

            $notify = new Notification;
            $notify->assign_by = auth()->user()->id;
            $notify->developer_id = $request->input('id');
            if($request->input('client_id')){
                $notify->user_id = $request->input('user_id');
            }
            $notify->complain_no = $complain->id;
            $notify->categories = $request->input('categories');
            $notify->type = $request->input('type');
            $notify->complain_status = $request->input('status');
            $notify->status_by_client = 0;
            $notify->status_by_admin = 0;

            $notify->save();


        
            // Send email
            Mail::to('admintest@gmail.com')->send(new ComplaintSubmitted($complain));
            return redirect()->back()->with('success', 'Complaint Submitted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the complaint: ' . $e->getMessage());
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
    public function view_detail_complain(Request $request){
        $id = $request->input('id');
        if(auth()->user()->role == 'admin'){
            $notifyid = Notification::where('id',$request->input('notifyid'))->first();
            $notifyid->status_by_admin = 1;
            $notifyid->save();
        }
        else{
            $notifyid = Notification::where('id',$request->input('notifyid'))->first();
            $notifyid->status_by_client = 1;
            $notifyid->save();
        }

        $complaint = Complain::where('id',$id)->first(); 

        return view('admin.complain.view_complain_by_id',compact('complaint'));
    }

}
