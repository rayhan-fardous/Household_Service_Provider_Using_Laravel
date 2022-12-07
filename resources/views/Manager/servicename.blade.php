<title>
 Manager | Add Service Name
</title>
@extends('Manager.layout')
@section('manager')

{{Session()->get('registration')}}

<h1>  Provider a Service </h1><br>
<form action="{{route('manager.addservicename.submit')}}" method="post">
{{@csrf_field()}}
     <table>
    <tr>
        <td id="academic"><h3> Provider a Service:</h3></td>
        <td><input type="text" name="name"></td>
       
    </tr>
    @error('name')
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


echo "<table id='id1' class='center' style = 'position:fixed; right:100px; top:200px;'>"; echo "<tr id='id1'><th id='id2'>Services Id</th><th id='id2'>Service Name</th></tr>";

foreach($services as $r)
{
    echo "<tr id='id1'><td id='id2'>".$r->id."</td><td id='id2'>".$r->name."</td></tr>";
        
    echo "<br>";

}


echo  "</table>";  


?>

@endsection