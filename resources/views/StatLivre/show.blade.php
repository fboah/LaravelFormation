@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Livre</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" >
        {!! csrf_field() !!}
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Livre</label>
            <select class="form-control" name="IdLivre" id="IdLivre" onchange="updateChart(this)" >
            <option id="IdLivre" value="0">Choisir un Livre</option>
         
            @foreach($livres as $item)
                <option id="IdLivre" value="{{$item->id}}">{{$item->Titre}}</option>
            @endforeach
             </select>

             <div class="row">


             <div class="col-lg-5">
                            <div class="card">

                                <div class="card-body">
              
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <div>
                <canvas id="chartId" height="350" width="380"></canvas>
                </div>

                <script>
                  $TitreLivre=array();
                  $QtiteLivre=array();

                function updateChart(option)
                {
                 let chartStatus = Chart.getChart("chartId"); // <canvas> id
                  if (chartStatus != undefined) {
                    chartStatus.destroy();
                  }


                 const Cste=document.getElementById('IdLivre')

                 var id=Cste.value;
                   idlivre=id;
                  // alert(id); 
                   
                  $.ajax({
                       type:"GET",
                       url:"/afficherAgenceByLivre/"+id,
                       dataType:"json",
                       success:function(data){
                       // console.log(data.Titre);
                         //  $('#IdAuteur').html(data);
                       //  $name=data.img;
                        
                        // console.log($name);
                        $TitreAgence=data.Agence;
                         $QtiteAgence=data.QtiteStock;

                         const ctx = document.getElementById('chartId');

                          new Chart(ctx, {
                          type: 'pie',
                          data: {
                            labels: $TitreAgence,
                          // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                          //labels: ['Red', 'Blue'],
                          datasets: [{
                              label: 'Qtité en Stock',
                             // data: [12, 19, 3, 5, 2, 3],
                              data: $QtiteAgence,
                              borderWidth: 2
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