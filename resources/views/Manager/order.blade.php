{{Session()->get('registration')}}
<head>
<title>
            Manager|placed order
        </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<center>
<table class="table table-hover">
            <tr>
                <th>#</th>
                <th> Customer Name</th>
                <th>Order List</th>
                <th>Branch</th>
                <th>Address</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <form action="{{route('manager.order.submit')}}" method="post">
            {{@csrf_field()}}
            @foreach($orders as $s)
            <tr>
                <td>
                    <input type="checkbox" value="{{$s->id}}" name="myid[]">
                </td>
                <td>{{$s->customer_name}}</td>
                <td>{{$s->list}}</td>
                <td>{{$s->branch}}</td>
                <td>{{$s->address}}</td>
                <td>{{$s->amount}}</td>
                <td>{{$s->status}}</td>
            </tr>
            @endforeach
           
        </table>
        <input type="submit" value="Process" class="btn btn-success">
</center>
