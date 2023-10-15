<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;
use App\Mail\ComplaintSubmitted;
use App\Mail\ComplaintStatus;
use App\Models\Notification;

class complaincontroller extends Controller
{
    public function view_complain()
    {
        if(auth()->user()->role  == 'admin'){
            $data = complain :: all();
            return view('admin.complain.viewcomplain',['members'=>$data]);
        }
        elseif(auth()->user()->role  == 'developer'){
            $data = complain :: where('developer_id',auth()->user()->id)->get();
            return view('developer.view_developer',['members'=>$data]);
        }
        else{
            $data = complain :: where('client_id',auth()->user()->id)->get();
            return view('client.view_client_complain',['members'=>$data]);
        }
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
            $complain->client_id = auth()->user()->id;
            if(auth()->user()->role == 'admin'){
                $complain->assign_by = auth()->user()->id;
            }

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
            $notify->assign_by = auth()->user()->id;

            $notify->save();


        
            // Send email
            Mail::to(auth()->user()->email)->send(new ComplaintSubmitted($complain));
            return redirect()->back()->with('success', 'Complaint Submitted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the complaint: ' . $e->getMessage());
        }
    }


    public function addcomplain()
    {
        $developer = User::where('role','developer')->get();
        dd($developer);
        return view('admin.complain.addcomplain',compact('developer'));
    }
    public function clientAddComplain(){
        $developer = User::where('role','developer')->get();
        return view('client.addcomplain',compact('developer'));
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
    public function complete_complain($id){
        try {
            $data = Complain::where('id', $id)->first();
            $data->status = 'Resolved';

            $notify = new Notification;
            $notify->assign_by = $data->assign_by;
            $notify->developer_id = auth()->user()->id;
            $notify->complain_no = $data->id; // Is $complain a typo? It should be $data->id
            $notify->categories = $data->categories;
            $notify->user_id = $data->client_id;
            $notify->type = $data->type;
            $notify->complain_status = $data->status;
            $notify->status_by_client = 0;
            $notify->status_by_admin = 0;
            $notify->assign_by = $data->assign_by;
        
            $notify->save();
            $data->save();

            Mail::to(auth()->user()->email)->send(new ComplaintStatus($data));
        
            return redirect()->back()->with('success', 'Complaint Resolved Successfully');
        } catch (QueryException $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred while resolving the complaint.');
        }
    }
    public function edit_complaint($id){
        $complain = Complain::where('id',$id)->first();
        $developer = User::where('role','developer')->get();
        return view('admin.complain.editComplain',compact('complain','developer'));
    }
    public function edit_complaint_store(Request $request){
         // Validate the form data
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create a new Complain model instance and populate it with the form data
        try {
            $complain = Complain::where('id',$request->complainId)->first();
            $complain->title = $request->title;
            $complain->description = $request->description;
            $complain->categories = $request->categories;
            $complain->status = $request->status;
            $complain->type = $request->type;
            $complain->client_id = auth()->user()->id;
            if(auth()->user()->role == 'admin'){
                $complain->assign_by = auth()->user()->id;
            }

            if ($request->id) {
                $complain->developer_id = $request->id;
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
            $notify->developer_id = $request->id;
            if($request->client_id){
                $notify->user_id = $request->user_id;
            }
            $notify->complain_no = $complain->id;
            $notify->categories = $request->categories;
            $notify->type = $request->type;
            $notify->complain_status = $request->status;
            $notify->status_by_client = 0;
            $notify->status_by_admin = 0;
            $notify->assign_by = auth()->user()->id;

            $notify->save();


        
            // Send email
            Mail::to(auth()->user()->email)->send(new ComplaintStatus($complain));
            return redirect()->back()->with('success', 'Complaint Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the complaint: ' . $e->getMessage());
        }
    }

}
