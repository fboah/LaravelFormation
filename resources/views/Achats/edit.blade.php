@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Modifier un Achat Fournisseur</div>
  <div class="card-body">
      
      <form action="{{ url('achats/' .$achat->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$achat->id}}" id="id" />

        <label>Date Achat</label>
        <input type="date" name="DateAchat" id="DateAchat" value="{{ date('Y-m-d',strtotime($achat->DateAchat))}}" class="form-control">



        <div class="form-group">
            <label for="exampleFormControlSelect1">Fournisseurs</label>
          
            <select name="IdFournisseur" class="form-control">
                @foreach ($fournisseurs as $item)
                <option @selected($item->id == $achat->IdFournisseur)
                    value="{{ $item->id }}">{{ $item->Libelle }}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Livres</label>
          
            <select name="IdLivre" class="form-control">
                @foreach ($livres as $item)
                <option @selected($item->id == $achat->IdLivre)
                    value="{{ $item->id }}">{{ $item->Titre }}</option>
                @endforeach
            </select>

        </div>

        
        <label>Quantité</label>
        <input type="number" name="Quantite" id="Quantite" value="{{$achat->Quantite}}" class="form-control">

      
        <label>Num. Facture</label>
        <input type="text" name="NumFacture" id="NumFacture" value="{{$achat->NumFacture}}" class="form-control">


        <div class="form-group">
            <label for="exampleFormControlSelect1">Site Livraison</label>
          
            <select name="IdSite" class="form-control">
                @foreach ($sites as $item)
                <option @selected($item->id == $achat->IdSite)
                    value="{{ $item->id }}">{{ $item->Libelle }}</option>
                @endforeach
            </select>

        </div>


        <input type="submit" value="Enregistrer" class="btn btn-success">
        <a href="{{ url('achats') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
    </form>
   
  </div>
</div>
 
@endsection