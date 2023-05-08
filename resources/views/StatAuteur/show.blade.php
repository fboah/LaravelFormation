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
             <div class="col-lg-9">
              
             
                
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <div>
                <canvas id="myChart"></canvas>
                </div>

                <script>
                    $revenue=array();

                function updateChart(option)
                {
                   // console.log(Cste.value);
                  //  myChart.data.datasets;
                 // ctx.update();
                 const Cste=document.getElementById('IdAuteur')

                 var id=Cste.value;
                   idlivre=id;
                  // alert(id); 
                   $.ajax({
                       type:"GET",
                       url:"/StatByAuteur/"+id,
                       dataType:"json",
                       success:function(data){
                        console.log(data);
                         //  $('#IdAuteur').html(data);

                        

                       
                       },
                       error:function(error){
                        console.log(data);
                       }
                   })

                }
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Qtité en Stock',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
                });

               // const myChart = new Chart(
                 //   document.getElementById('myChart'),
                   // config
                //);

               
                </script>
                        
 
              </div>
  
            </div>

        </div>

    </form>


   
  </div>
</div>
 
@endsection