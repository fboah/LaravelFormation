@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter une Catégorie</div>
  <div class="card-body">
      
      <form action="{{ url('categories') }}" method="post">
        {!! csrf_field() !!}
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" class="form-control">
        <label>Description</label>
        <input type="text" name="Description" id="Description" class="form-control">
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('categories') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection