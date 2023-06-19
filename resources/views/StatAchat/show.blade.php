@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Statistiques Achats</div>
  <div class="card-body">
      
      <form >
        {!! csrf_field() !!}

        
        <div class="col-lg-3">
      
        <label>Date Début Achat</label>
        <input type="date" name="DateDebutAchat" id="DateDebutAchat" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <label>Date Fin Achat</label>
        <input type="date" name="DateFinAchat" id="DateFinAchat" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <input  value="Visualiser" class="btn btn-success" onclick="updateChart(this)">
     
        </div>
        
        <div class="form-group">
           
             <div class="row">

             <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

               <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

              <div>
              <canvas id="chartId"></canvas>
              </div>

              <script>
              
              $TitreAgence=array();
                $QtiteAgence=array();
              function updateChart(option)
              {
               
                let chartStatus = Chart.getChart("chartId"); // <canvas> id
                  if (chartStatus != undefined) {
                    chartStatus.destroy();
                  }

                
               // const DateDebutAchatN=document.getElementById('DateDebutAchat');
                //  console.log(DateDebutAchatN); 
              //  const DateDebutFinN=document.getElementById('DateDebutFin');

              var DateDebut=DateDebutAchat.value;
              var DateFin=DateFinAchat.value;
                // console.log(DateDe); 
//                var DateDebutAchat=DateDebutAchatN.value;
               // var DateDebutFin=DateDebutFinN.value;
                 
               // console.log(DateDebutAchat); 
               

                  $.ajax({
                      type:"GET",
                     // url:"/StatByAchat/"+DateDebut,
                      url:"/StatByAchat/"+DateDebut+"/"+DateFin,
                       dataType:"json",
                      success:function(data){

                      //  console.log(data);
                        $TitreAgence=data.DateAchat;
                         $QtiteAgence=data.NbreAchat;
                      
                      var chrt = document.getElementById("chartId");//.getContext("2d");
                       var chartId = new Chart(chrt, {
                        type: 'line',
                        data: {
                   // labels: ["HTML", "CSS", "JAVASCRIPT", "CHART.JS", "JQUERY", "BOOTSTRP"],
                      labels:  $TitreAgence,
                      datasets: [{
                        label: "Nbre d'achat",
                        data:  $QtiteAgence,
                       //  data: [20, 40, 30, 35, 30, 20],
                       // backgroundColor: ['blue'],
                      // borderColor:'rgb(255, 99, 132)',
                       borderColor:'purple',
                       
                        // borderColor: ['red', 'blue', 'fuchsia', 'green', 'navy', 'black'],
                        borderWidth: 5,
                              }],
                          },
                          options: {
                              responsive: true,
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