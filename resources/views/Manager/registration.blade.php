<html>
<body>
    <head>
<title>
           Manager | Registration
        </title>
        <link rel="stylesheet" href="{{asset('manager.css')}}">
</head>
 <div class="form-wrap">
    <form action="{{route('manager.registration.submit')}}"  method="post" enctype="multipart/form-data">
    {{@csrf_field()}}
    
    <h1 id=colorfm>Registration For Manager</h2><hr/>
    <!-- <p id="wrong" class="colorfm1"></p>
    <p id="colorfm"><?php //echo $vusername; ?></p> -->

            <input type="text"  name="username" value="{{old('username')}}" placeholder="Username">
            @error('username')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="email"  name="email" value="{{old('email')}}" placeholder="Email">
            @error('email')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="password"  name="password" placeholder="Password">
            @error('password')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="password"  name="cpassword" placeholder="Confirm Password">
            @error('cpassword')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <table><tr><td id=colorfm>Male</td><td>
            <input type="radio" name="gender"  value="Male"> </td><td id="colorfm">Female</td><td>
            <input type="radio" name="gender"  value="Female"> </td></tr></table>
            @error('gender')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="text"  name="mobile" value="{{old('mobile')}}" placeholder="Mobile Number"> 
            @error('mobile')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <table><tr><td id=colorfm2 >Date Of Birth</td></tr><tr><td>   
            <input type="date"  name="date" value="{{old('date')}}" > </td></tr></table>  
            @error('date')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="file"  name="picture" value="{{old('picture')}}" >
            @error('picture')
            <span id=colorfm>{{$message}}</span>
            @enderror
            <br>
            <input type="submit" value="Register">
</form>
</div>
</body>
</html>