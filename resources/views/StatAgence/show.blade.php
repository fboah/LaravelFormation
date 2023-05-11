@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Agence</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" >
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Agence</label>
            <select class="form-control" name="IdSite" id="IdSite" onchange="updateChart(this)" >
            <option id="IdSite" value="0">Choisir une Agence</option>
         
            @foreach($agences as $item)
                <option id="IdSite" value="{{$item->id}}">{{$item->Libelle}}</option>
            @endforeach
             </select>

             <div class="row">


             <div class="col-lg-5">
                            <div class="card">

                                <div class="card-body">
              
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <div>
                <canvas id="myChart"></canvas>
                </div>

                <script>
                  $TitreLivre=array();
                  $QtiteLivre=array();

                function updateChart(option)
                {
                 let chartStatus = Chart.getChart("myChart"); // <canvas> id
                  if (chartStatus != undefined) {
                    chartStatus.destroy();
                  }


                 const Cste=document.getElementById('IdSite')

                 var id=Cste.value;
                   idlivre=id;
                  // alert(id); 
                   $.ajax({
                       type:"GET",
                       url:"/StatByAgence/"+id,
                       dataType:"json",
                       success:function(data){
                      //  console.log(data.Titre);
                         //  $('#IdAuteur').html(data);
                       //  $name=data.img;
                        
                        // console.log($name);
                         $TitreLivre=data.Titre;
                         $QtiteLivre=data.QtiteStock;

                         const ctx = document.getElementById('myChart');

                          new Chart(ctx, {
                          type: 'pie',
                          data: {
                            labels: $TitreLivre,
                          // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                          //labels: ['Red', 'Blue'],
                          datasets: [{
                              label: 'Qtité en Stock',
                             // data: [12, 19, 3, 5, 2, 3],
                              data: $QtiteLivre,
                              borderWidth: 1
                          }]
                          },
                           options : {
                                            title: 'Les livres selon leur quantité',
                                            is3D:'true'
                                            }

                        //  options: {
                          //scales: {
                            // // y: {
                              ////beginAtZero: true
                              ////}
                          //}
                          //}
                          });

                       
                       },
                       error:function(error){
                        console.log(data);
                       }
                   })

                   //Obtenir la photo de l'auteur=====================

                 //  $.ajax({
                   //   type:"GET",
                   //   url:"/StatByAuteurImage/"+id,
                    //   dataType:"json",
                    //  success:function(data){
                    //   // $idauteur="/images/"+data.Image;
                     //  $idauteur=data.Image;
                       
                       // console.log($idauteur);
                         
                     //  },
                     // error:function(error){
                      //  console.log(data);
                      // }
                 //  })


                }
              
               
                </script>
                        
                        </div>
              </div>
  
            </div>


            <div class="col-lg-7">
                            <div class="card">

                                <div class="card-body">

                                <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Agence', 'Stock'],
          <?php echo $dataAutAgence;  ?> 
        ]);

        var options = {
          chart: {
            title: 'Stock/Agence',
            subtitle: 'Quantité de livres par Agence ',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 550px; height: 370px;"></div>
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