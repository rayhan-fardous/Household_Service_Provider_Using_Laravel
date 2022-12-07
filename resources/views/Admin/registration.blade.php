<html>
<head>
    <title>Admin/Registration</title>
    <link rel="stylesheet" href="{{asset('admin.css')}}">
</head>

<body>

<center ><p class="validcolor" id="error"></p></center>
 
 <div class="form-wrap" ><center class=tsz><b><i>Create a New Account</i></b></center>
 <form action="{{route('admin.registration.submit')}}"  method="post" enctype="multipart/form-data">
 {{@csrf_field()}}
 <p id="error"></p>
 
 <div class="formdes" >

      <input type="text" class=tsz  name="username" value="{{old('username')}}" placeholder="Username">
            @error('username')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
       Date of Birth:
      <input type="date" class=tsz   name="date_of_birth" value="{{old('date_of_birth')}}">
            @error('date_of_birth')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
       
   Gender:
    
    <input type="radio"  name="gender" value="Male"> Male
    <input type="radio"  name="gender"  value="Female"> Female
              @error('gender')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>

       <input type="password" class=tsz  name="password" placeholder="Password">
            @error('password')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>

       <input type="password" class=tsz  name="cpassword" placeholder="Confirm Password">
            @error('cpassword')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>

       <input type="email" class=tsz  name="email" value="{{old('email')}}"  placeholder="Email">
            @error('email')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>

        <input type="phone" class=tsz  name="phone" value="{{old('phone')}}" placeholder="Phone Number">
            @error('phone')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>

            <input type="file" class=tsz  name="picture" value="{{old('picture')}}" >
            @error('picture')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
  
<br><br><input type="submit" name="submit" class="regbutton" value="Create">

  </div>                
</div>







            </form>
            
        </body>
    
</html>
