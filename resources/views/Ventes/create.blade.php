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
            <label for="exampleFormControlSelect1">Livres</label>
            <select class="form-control" name="IdLivre" >
                @foreach($livres as $item)
                <option id="IdLivre" value="{{$item->id}}">{{$item->Titre}}</option>
                @endforeach
             </select>

        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Site Livraison</label>
            <select class="form-control" name="IdSite" onchange="getvalSite(this);" >
                @foreach($sites as $item)
                <option id="IdSite" value="{{$item->id}}">{{$item->Libelle}}</option>
                @endforeach
             </select>

        </div>

        <div class="col-lg-4">
        <label>Quantité en Stock</label>
        <input type="number" name="QuantiteStock" readonly="readonly" id="Quantite" class="form-control">
        </div>


        <div class="col-lg-4">
        <label>Quantité</label>
        <input type="number" name="Quantite" id="Quantite" class="form-control">
        </div>
        <label>Num. Facture</label>
        <input type="text" name="NumFacture" id="NumFacture" class="form-control">
        
        
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/ventes') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>

    @push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.js-example-basic-single').select2({
            theme: "classic"
        });
        $('body').on('change','.IdLivre',()=>{
            const text = $('.IdLivre').find(":selected").text();
            const value = $('.IdLivre option:selected').val();
            $('#value').html(value);
        });
    </script>
    @endpush

       


<script type="text/javascript">
  //    function getvalLivre(selt) {
    //  // alert(selt.value );
    
      // var livre_id=selt.value;
    
       // $.ajax=({
       //    //La méthode d'envoi (type de requête)
       //    type: 'GET',
       //   //L'URL de la requête 
       //   url: '{!!URL::to('findstock')!!}',
       //   data:{'id':livre_id},
        //  success:function(data){
        //    console.log(data);
        //  }

        //  //Le format de réponse attendu
        //  dataType : "json",
       // })

      //  };


       // function getvalSite(sel) {
        
       // alert( sel.value );
      //  };
  </script>
          
          
   
  </div>
</div>


 
@endsection



