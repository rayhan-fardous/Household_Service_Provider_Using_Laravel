<html>
 <body>
     <head>
        <link rel="stylesheet" href="{{asset('manager.css')}}">

</head>
<center><div><h1>Amader sheba</h1> </div></center>
 <h2>Welcome  <a id="myfavourite" href="{{route('manager.profile')}}">{{Session()->get('username')}} </a> </h2>

  <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="{{route('manager.home')}}"><h2>|| Home |</h2> </a>
  <a href="#" ><a href="{{route('manager.setting')}}"><h2>| Change Password  |</h2> </a> 
  <a href="#" ><a href="{{route('manager.update')}}"><h2>| Update Information  |</h2> </a>
  <a href="#" ><a href="{{route('manager.leave')}}"><h2>| Leave Application  |</h2> </a>
  <a href="#" ><a href="{{route('manager.transfer')}}"><h2>| Apply For Transfer  ||</h2> </a>
  <b href="#"> <a href="{{route('logout')}}"><h2> LogOut </h2></a>
 </div> </div>
<br> 
@yield('manager')

<center> <div> Copy Right @copy amader.sheba </div></center>
</html>