<html>
 <body>
     <head>
 <title>
            Manager|profile
        </title>
        <link rel="stylesheet" href="{{asset('manager.css')}}">
        
</head>
 <div class="sticky">
<div class="topnav">
  <li><a href="#"> <a href="{{route('manager.home')}}"><h2>Home</h2> </a>
  <b href="#"> <a href="{{route('logout')}}"><h2>LogOut</h2></a>

 </div> </div>
 <br>
  <h1 id="vname"> My Profile </h1>
<br><br><br><br>
<center>
<!-- <img src="{{ asset('$manager->image') }}" style="width: 100%; height: 100%;"> -->
 <img src="/s/Profile Picture/zYAQX5M9H2AlimRX4BKpKOyXjeUY5NLWmWSJ1jLG.jpg" style="width: 30%; height: 30%;"> 

<div>
<table>
<tr>
<td class="academics academicsitem">Username :</td>
<td class="academics academicsitem">{{$manager->username}}</td>
</tr>
<tr>
<td class="academics academicsitem">Email :</td>
<td class="academics academicsitem">{{$manager->email}}</td>
</tr>
<tr>
<td class="academics academicsitem">Gender :</td>
<td class="academics academicsitem">{{$manager->gender}}</td>
</tr>
<tr>
<td class="academics academicsitem">Mobile Number :</td>
<td class="academics academicsitem">{{$manager->phone}}</td>
</tr>

<tr>
<td class="academics academicsitem">Date of birth : </td>
<td class="academics academicsitem">{{$manager->dob}}</td>
</tr>

<tr>
<td class="academics academicsitem">Branch : </td>
<td class="academics academicsitem">{{$manager->branch}}</td>
</tr>

<tr>
<td class="academics academicsitem">Salary : </td>
<td class="academics academicsitem">{{$manager->salary}}</td>
</tr>

</table>
</div>
</center>
</body>

</html>