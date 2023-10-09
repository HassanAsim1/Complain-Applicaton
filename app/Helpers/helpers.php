<?php

use App\Models\User;






function getname($id){
    $data = User::where('id',$id)->first();
    if($data){
        return $data->name;
    }
    else{
        return '';
    }  
}