<?php

use App\Models\User;
use App\Models\Notification;





function getname($id){
    $data = User::where('id',$id)->first();
    if($data){
        return $data->name;
    }
    else{
        return '';
    }  
}

function getnotification(){
    if(auth()->user()->role == 'admin'){
        $data = Notification::where('assign_by',auth()->user()->id)->where('status_by_admin',0)->get();
        return $data;
    }
    else{
        $data = Notification::where('user_id',auth()->user()->id)->where('status_by_client',0)->get();
        return $data;
    }
}

function gettotalnotificaton(){
    if(auth()->user()->role == 'admin'){
        $data = Notification::where('assign_by',auth()->user()->id)->where('status_by_admin',0)->get();
        return count($data);
    }
    else{
        $data = Notification::where('user_id',auth()->user()->id)->where('status_by_client',0)->get();
        return count($data);
    }
}

function getnameabv($id){
    $data = User::where('id',$id)->first();
    if($data){
        return substr($data->name, 0, 1);
    }
    else{
        return '';
    }  
}