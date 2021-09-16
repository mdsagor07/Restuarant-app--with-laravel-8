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
        $data=food::all();
        return view("admin.foodmenu",compact("data"));
    }
    public function upload( Request $request )
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data= new food;
        $image=$request->image;
        $imageName = time().'.'.$request->image->extension(); 
     
        $request->image->move(public_path('foodimage'), $imageName);
        
        $data->image=$imageName;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();

        return back()
        ->with('success','You have successfully upload image.')
        ->with('image',$imageName);

        
        
    }
}
