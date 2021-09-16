<x-app-layout>
 
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
   @include("admin.navbar")
   
   <div style="position:relative; top:60px; right: -150px">
       <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
       @csrf  
           <div>
                <label > Title </label>
                <input style="color:blue" type="text" name="title" placeholder="write the title" required>
            </div>
            <div>
                <label > Price </label>
                 <input style="color:blue" type="text" name="price" placeholder="write the price" required>
            </div>
            <div>
                 <label > Image </label>
                <input style="color:blue" type="file" name="image" placeholder="opload the image" required>
            </div>
            <div>
                <label > Description </label>
                <input style="color:blue" type="text" name="description" placeholder="write the description" required>
                </div>
             <div >
                <input style="color: black"  type="submit"  value="Save">
             </div>

       </form>
       <div>
         <table bgcolor="black">
           <tr>
             <th style="padding:30px">Food Name</th>
             <th  style="padding:30px">Price</th>
             <th  style="padding:30px">Description</th>
             <th  style="padding:30px">Image</th>
           </tr>
           @foreach($data as $data)
           <tr align="center">
             <td>{{$data->title}}</td>
             <td>{{$data->price}}</td>
             <td>{{$data->description}}</td>
             <td > <img height="100" width="100" src="/foodimage/{{$data->image}}" alt="image"></td>
           </tr>
           @endforeach
         </table>
       </div>
       

</div>
@include("admin.adminscript")
  </body>
</html>