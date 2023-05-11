@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Achats</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" >
        {!! csrf_field() !!}
        
        <div class="form-group">
           

             <div class="row">


             <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">

                                <html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Période');
      data.addColumn('number', 'Guardians of the Galaxy');
     // data.addColumn('number', 'The Avengers');
      //data.addColumn('number', 'Transformers: Age of Extinction');

      data.addRows([
        [1,  37.8],
        [2,  30.9],
        [3,  25.4],
        [4,  11.75],
        [5,  11.9]
       
      ]);
    
      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>
                        
                        </div>
              </div>
  
            </div>




        </div>

        </div>

    </form>


   
  </div>
</div>
 
@endsection 