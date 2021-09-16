<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\food;
use App\Models\Reservation;


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
    public function deletemenu($id)
    {
        $data=food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updateview($id)
    {
        $data=food::find($id);
        return view("admin.updateview",compact("data"));
    }

   

    public function update(Request $request,$id)
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


    public function reservation(Request $request)
    {
       

        $data= new reservation;
      
    
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        
        
        $data->save();

        return redirect()->back();
       

    }
}
