<!DOCTYPE html>
{{Session()->get('registration')}}
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{asset('login.css')}}">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="{{route('login.submit')}}" method="post">
      {{@csrf_field()}}
        <div class="txt_field">
          <input type="text" required  name="username" value="{{old('username')}}" >
          <span></span>
          <label>Username</label>
        </div>
            @error('username')
            <span id=colorfm>{{$message}}</span>
            @enderror
            
        <div class="txt_field">
          <input type="password" required name="password" value="{{old('password')}}">
          <span></span>
          <label>Password</label>
        </div>
            @error('password')
            <span id=colorfm>{{$message}}</span>
            @enderror
            
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member?
          <br>
         Sign Up As<br>
          <a href="{{route('admin.registration')}}">Admin</a>|<a href="{{route('manager.registration')}}">Manager</a>|<a href="{{route('admin.registration')}}">Staff</a>|<a href="{{route('admin.registration')}}">Customer</a>
          <!-- //Admin | manager | staff | customer -->
        </div>
      </form>
    </div>

  </body>
</html>
