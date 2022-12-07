<title>
 Manager | Transfer
</title>
@extends('Manager.layout')
@section('manager')
<html>
<body>
{{Session()->get('registration')}}
<center>
    <h1> Transfer Request </h1>
<form  id=update0 action="{{route('manager.transfer.submit')}}"  method="post">
{{@csrf_field()}}
current branch<br>
  <input type="text"  name="branch" value="{{$manager->branch}}"><br>
@error('branch')
<span id=mini>{{$message}}</span>
@enderror
<br>
Desire branch<br>
  <input type="text"  name="branch1" value="{{old('branch1')}}"><br>
@error('branch1')
<span id=mini>{{$message}}</span>
@enderror
<br>
  <input id=update0 type="submit" value="Request">
</form>
</center>

</body>
</html>
@endsection

