<title>
 Manager | Home
</title>
@extends('Manager.layout')
@section('manager')
{{Session()->get('registration')}}

<div>
<ol class="c">
  <li class="academics academicsitem"><a href="{{route('manager.addservicename')}}"><h3>Provide a Service </h3></a></li>
  <li class="academics academicsitem"><a href="{{route('manager.addservice')}}"><h3>Add Services</h3></a></li>
  <li class="academics academicsitem"><a href="{{route('manager.order')}}"><h3>Process Order</h3></a></li>
  <li class="academics academicsitem"><a href="{{route('manager.earn')}}"><h3>Total Earn</h3></a></li>
</ol>
</div>



















@endsection