@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Achats</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" >
        {!! csrf_field() !!}

        
        
        <div class="col-lg-3">
           
        <label>Date Début Achat</label>
        <input type="date" name="DateDebutAchat" id="DateDebutAchat" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <label>Date Fin Achat</label>
        <input type="date" name="DateFinAchat" id="DateFinAchat" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <input type="submit" value="Visualiser" class="btn btn-success" onchange="updateChart(this)">

        </div>
        
        <div class="form-group">
           
             <div class="row">


             <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">

                                <html>
                                  <head>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                      google.charts.load('current', {'packages':['corechart']});
                                      google.charts.setOnLoadCallback(drawChart);

                                      function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                          ['Date', 'Nbre Achat'],
                                          <?php echo $dataAchat;  ?> 
                                         
                                         // ['01/07/2008',1000],
                                         // ['02/09/2008',1170],
                                         // ['12/09/2010',660],
                                        //  ['22/03/2012',1030]
                                        ]);

                                        var options = {
                                          title: 'les Achats Fournisseurs',
                                          curveType: 'function',
                                          legend: { position: 'bottom' }
                                        };

                                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                        chart.draw(data, options);
                                      }
                                    </script>
                                  </head>
                                  <body>
                                    <div id="curve_chart" style="width: 1000px; height: 500px"></div>
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