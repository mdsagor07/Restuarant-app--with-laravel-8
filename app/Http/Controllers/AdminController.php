<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\food;

class AdminController extends Controller
{
    public function user()
    {
        $data=user::all(); 
        return view("admin.user",compact("data"));
    }

    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {

        return view("admin.foodmenu");
    }
    public function upload( Request $request )
    {
        $data= new food;
        $image=$request->image;
        $imageName = time().'.'.$request->image->extension(); 
     
        $request->image->move(public_path('foodimage'), $imageName);
        
        $data->image=$imageName;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();

        return redirect()->back(); 

        
        
    }
}
