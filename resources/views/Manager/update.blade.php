<title>
 Manager | Update Information
</title>
@extends('Manager.layout')
@section('manager')
<html>
<body>
{{Session()->get('registration')}}
<center>
    <h1> Update Information </h1>
<form  id=update0 action="{{route('manager.update.submit')}}"  method="post">
{{@csrf_field()}}
  <input type="text"  name="username" value="{{$manager->username}}"><br>
@error('username')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input type="email"  name="email" value="{{$manager->email}}"><br>
 @error('email')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input type="text"  name="phone" value="{{$manager->phone}}"><br>
  @error('phone')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input id=update0 type="submit" value="Update">
</form>
</center>

</body>
</html>
@endsection

