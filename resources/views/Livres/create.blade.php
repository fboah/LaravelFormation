@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter un Livre</div>
  <div class="card-body">
      
      <form action="{{ url('/livres') }}" method="post">
        {!! csrf_field() !!}
        <label>Titre</label>
        <input type="text" name="Titre" id="Titre" class="form-control">


        <div class="form-group">
            <label for="exampleFormControlSelect1">Catégorie</label>
            <select class="form-control" name="IdCategorie">
                @foreach($categories as $item)
                <option id="IdCategorie" value="{{$item->id}}">{{$item->Libelle}}</option>
                @endforeach
             </select>

        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Auteur</label>
            <select class="form-control" name="IdAuteur">
                @foreach($auteurs as $item)
                <option id="IdAuteur" value="{{$item->id}}">{{$item->Prenom}} {{$item->Nom}}</option>
                @endforeach
             </select>

        </div>


        <label>Date Parution</label>
        <input type="date" name="DateParution" id="DateParution" class="form-control" value="<?php echo date('Y-m-d'); ?>">
        
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/livres') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection