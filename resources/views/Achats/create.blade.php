@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter un Achat Fournisseur</div>
  <div class="card-body">
      
      <form action="{{ url('/achats') }}" method="post">
        {!! csrf_field() !!}


        <label>Date Achat</label>
        <input type="date" name="DateAchat" id="DateAchat" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Fournisseurs</label>
            <select class="form-control" name="IdFournisseur">
                @foreach($fournisseurs as $item)
                <option id="IdFournisseur" value="{{$item->id}}">{{$item->Libelle}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Livres</label>
            <select class="form-control" name="IdLivre">
                @foreach($livres as $item)
                <option id="IdLivre" value="{{$item->id}}">{{$item->Titre}}</option>
                @endforeach
             </select>
        </div>

        <label>Quantité</label>
        <input type="number" name="Quantite" id="Quantite" class="form-control">

        <label>Num. Facture</label>
        <input type="text" name="NumFacture" id="NumFacture" class="form-control">


        <div class="form-group">
            <label for="exampleFormControlSelect1">Site Livraison</label>
            <select class="form-control" name="IdSite">
            <option id="IdSite" value="0">Choisir une agence</option>
                @foreach($sites as $item)
                <option id="IdSite" value="{{$item->id}}">{{$item->Libelle}}</option>
                @endforeach
             </select>
        </div>


        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/achats') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection