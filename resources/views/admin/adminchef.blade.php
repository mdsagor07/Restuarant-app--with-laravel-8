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


   <form action="{{url('uploadchef')}}" method="post" enctype="multipart/form-data" style="position:relative; top:60px; right: -150px">
    @csrf
   <div>
      
      <div>
          <label > Name</label>
          <input style="color:blue" type="text" name="name" placeholde=" Enter name">
      </div>
      <div>
          <label > Speciality</label>
          <input style="color:blue;"  type="text" name="speciality" required =" " placeholde=" Enter speciality">
      </div>
      <div>
          <label > Image</label>
          <input type="file" name="image" required =" " >
      </div>
      <input style="color:blue;" type="submit" value="save">

  </div>

</form>
   
  
       
   
   
</div>
   @include("admin.adminscript")
    
  </body>
</html>