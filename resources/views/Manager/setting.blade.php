<title>
 Manager | Update Information
</title>
@extends('Manager.layout')
@section('manager')
<html>
<body>
{{Session()->get('registration')}}
<center>
    <h1> Change Password </h1>
<form  id=update0 action="{{route('manager.setting.submit')}}"  method="post">
{{@csrf_field()}}
  <input type="password"  name="cupassword" placeholder="Current Password"><br>
@error('cupassword')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input type="password"  name="password" placeholder="New Password"><br>
 @error('password')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input type="password"  name="cpassword" placeholder="Confirm New Password"><br>
  @error('cpassword')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input id=update0 type="submit" value="Update">
</form>
</center>

</body>
</html>
@endsection

