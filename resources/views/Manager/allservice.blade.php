<title>
 Manager | Add Service Name
</title>
@extends('Manager.layout')
@section('manager')

{{Session()->get('registration')}}

<h1> Add Services </h1><br>
<form action="{{route('manager.addservice.submit')}}" method="post">
{{@csrf_field()}}
     <table>
    <tr>
        <td id="academic"><h3> Service Name:</h3></td>
        <td><input type="text" name="sname" value="{{old('sname')}}"></td>
       
    </tr>
    @error('sname')
    <span id=mini>{{$message}}</span>
    @enderror
    <br>
    <tr>
        <td id="academic"><h3> Price:</h3></td>
        <td><input type="text" name="sprice" value="{{old('sprice')}}"></td>
       
    </tr>
    @error('sprice')
    <span id=mini>{{$message}}</span>
    @enderror
    <br>
    <tr>
        <td id="academic"><h3> Group:</h3></td>
        <td><input list="browsers" name="multi" value="{{old('multi')}}">
  <datalist id="browsers">
  @foreach($service as $s)
    <option value="{{$s->name}}">
    @endforeach
  </datalist>
</td>
       
    </tr>
    @error('multi')
    <span id=mini>{{$message}}</span>
    @enderror
    <br>
<tr>
<td>
<input type="submit"  value="Add Service">
</td>

</tr>
</table>
</form>
<?php 


echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:200px;'>"; echo "<tr id='id1'><th id='id2'>Service Name</th><th id='id2'>Service Price</th><th id='id2'>Service Head</th></tr>";

foreach($services as $r)
{
    echo "<tr id='id1'><td id='id2'>".$r->s_name."</td><td id='id2'>".$r->price."</td><td id='id2'>".$r->services->name."</td></tr>";
        
    echo "<br>";

}


echo  "</table>";  


?>

<!-- <table id='id1' class='center' style = 'position:fixed; right:100px; top:200px;'>
            <tr>
                <th>Service Name</th>
                <th> Price </th>
                <th>Service Head</th>
            
            </tr>
            @foreach($services as $s)
            <tr>
            
                <td>{{$s->s_name}}</td>
                <td>{{$s->price}}</td>
                <td>{{$s->services->name}}</td>
            
            </tr>
            @endforeach
        </table> -->

@endsection
