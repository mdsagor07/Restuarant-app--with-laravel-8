<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

     <div style="position:relative; top:60px; right: -50px" >
         <table bgcolor="black" border =" 3px">
             <tr>
                 <th style="padding: 30px;">Name</th>
                 <th style="padding: 30px;">Email</th>
                 <th style="padding: 30px;">Action</th>
             </tr>


             @foreach($data as $data)
             <tr align="center">
                 <td align="center">{{$data->name}}</td>
                 <td align="center">{{$data->email}}</td>
                 @if($data->usertype=="0")
                 <td align="center"> <a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
                 @else
                 <td align="center"> Not Allow</td>
                 @endif
             </tr>
             @endforeach

             
         </table>
     </div>
   </div>
   @include("admin.adminscript")
    
  </body>
</html>
</body>
</html>