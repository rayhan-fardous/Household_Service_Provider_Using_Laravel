{{Session()->get('registration')}}
<head>
<title>
            Manager|Total Revenue
        </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<center>
<table class="table table-hover">
            <tr>
                @foreach($services as $s)
                <th>{{$s->s_name}}</th>
                @endforeach
            </tr>


            <tr>
                <?php 
                 use App\Models\handover;
                    foreach($services as $s)
                    {
                       $servicename=$s->s_name;
                       $totalincome=0;
                       $my=handover::where('area',$servicename)->where('status',"success")->get();
                       foreach($my as $m)
                       {
                        $totalincome=$totalincome+$m->amount;
                       }
                       echo "<td>".$totalincome."</td>";

                    }
 
                ?>
            </tr>
           
           
        </table>
       
</center>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         <?php echo $arr ; ?>
        ]);

        var options = {
          title: 'Income Chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>