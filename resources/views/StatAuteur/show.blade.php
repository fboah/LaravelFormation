@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Auteur</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" >
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Auteur</label>
            <select class="form-control" name="IdAuteur" id="IdAuteur" onchange="updateChart(this)" >
            <option id="IdAuteur" value="0">Choisir un Auteur</option>
         
            @foreach($auteurs as $item)
                <option id="IdAuteur" value="{{$item->id}}">{{$item->Prenom}} {{$item->Nom}}</option>
            @endforeach
             </select>

             <div class="row">


             <div class="col-lg-6">
                            <div class="card">

                                <div class="card-body">
              
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

                <div>
                <canvas id="myChart" ></canvas>
                <canvas id="chartId" height="350" width="380"></canvas>
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

                  let chartStatusBar = Chart.getChart("chartId"); // <canvas> id
                  if (chartStatusBar != undefined) {
                    chartStatusBar.destroy();
                  }

                 const Cste=document.getElementById('IdAuteur')

                 var id=Cste.value;
                   idlivre=id;
                  // alert(id); 

                  $.ajax({
                       type:"GET",
                       url:"/StatByAuteur/"+id,
                       dataType:"json",
                       success:function(data){
                       // console.log(data.Titre);
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
                  

                     //Obtenir les agences de l'auteur=====================

                     
                     $.ajax({
                      type:"GET",
                      url:"/afficherAgenceByAuteur/"+id,
                       dataType:"json",
                      success:function(data){
                        $TitreAgence=data.Agence;
                         $QtiteAgence=data.QtiteStock;
                      //  console.log(data);
                      var chrt = document.getElementById("chartId");//.getContext("2d");
                       var chartId = new Chart(chrt, {
                        type: 'bar',
                        data: {
                  //  labels: ["HTML", "CSS", "JAVASCRIPT", "CHART.JS", "JQUERY", "BOOTSTRP"],
                      labels:  $TitreAgence,
                      datasets: [{
                        label: "Stock/Agence",
                        data:  $QtiteAgence,
          //               data: [20, 40, 30, 35, 30, 20],
                        backgroundColor: ['green'],
                        // borderColor: ['red', 'blue', 'fuchsia', 'green', 'navy', 'black'],
                        borderWidth: 1,
                              }],
                          },
                          options: {
                              responsive: false,
                          },
                        });
    
                       },
                      error:function(error){
                        console.log(data);
                       }
                   })





                }
              
               
                </script>
                        
                        </div>
              </div>
  
            </div>

         

        </div>

        </div>

    </form>


   
  </div>
</div>
 
@endsection