@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter une Vente</div>
  <div class="card-body">
      
      <form action="{{ url('/ventes') }}" method="post">
        {!! csrf_field() !!}
        <label>Date Vente</label>
        <input type="date" name="DateVente" id="DateVente" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Livre</label>
            <select class="form-control" name="IdLivre" id="IdLivre" >
            <option id="IdLivre" value="0">Choisir un Livre</option>
                @foreach($livres as $item)
                <option id="IdLivre" value="{{$item->id}}">{{$item->Titre}}</option>
                @endforeach
             </select>

        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Site d'Achat</label>
            <select class="form-control" name="IdSite" id="IdSite"  >
           
            
             </select>
        </div>

        <div class="col-lg-4">
        <label>Quantité en Stock</label>
        <input type="number" name="QuantiteStock" readonly="readonly" id="QuantiteStock" value="0" class="form-control">
        </div>


        <div class="col-lg-4">
        <label>Quantité</label>
        <input type="number" name="Quantite" id="Quantite" class="form-control" min="0" value="0">
        </div>
        <label>Num. Facture</label>
        <input type="text" name="NumFacture" id="NumFacture" class="form-control">
        


        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/ventes') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var idlivre="";

            var qtitestock="";

            $('#IdLivre').change(function(){

                $('#QuantiteStock').val(0);
                $('#Quantite').val(0);
              //  $.ajaxSetup({
              //  });
                   var id=$(this).val();
                   idlivre=id;
                  // alert(id); 
                   $.ajax({
                       type:"GET",
                       url:"/SiteByLivre/"+id,
                       dataType:"json",
                       success:function(data){
                           //console.log(data);
                           $('#IdSite').html(data);
                       },
                       error:function(error){
                        console.log(data);
                       }
                   })


            })


            $('#IdSite').change(function(){

                $('#QuantiteStock').val(0);
                $('#Quantite').val(0);

            var idsite=0;
             idsite=$(this).val();
            
            // alert(idsite); 
            if(idsite!=0)
            {
                $.ajax({
                type:"GET",
                url:"/SiteByLivreStock/"+idlivre+"/"+idsite,
                dataType:"json",
                success:function(data){
                   
                  //  console.log(data[0].Qtite)
                  qtitestock=data[0].QtiteStock;
                    $('#QuantiteStock').val(data[0].QtiteStock);

                  //  $('#attend').val(data[0]);
                  //  $('#QuantiteStock').val(ret[1]);
                   
                },
                error:function(error){
                console.log(data);
                }
            })

            }
            else
            {
                //Affecter 0 a la quantité en stock
            }
          

            $('#Quantite').change(function(){

               // $('#Quantite').max.max(qtitestock);
                
                $("#Quantite").attr({
                    "max" : qtitestock
                    });
                // alert(id); 
               
                })
                   

    })
          
        });
    
    </script>
 
  </div>
</div>


 
@endsection



