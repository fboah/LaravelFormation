@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Modifier une Catégorie</div>
  <div class="card-body">
      
      <form action="{{ url('categories/' .$categorie->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$categorie->id}}" id="id" />
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" value="{{$categorie->Libelle}}" class="form-control">
        <label>Description</label>
        <input type="text" name="Description" id="Description" value="{{$categorie->Description}}" class="form-control"></br>
    
        <input type="submit" value="Enregistrer" class="btn btn-success">
        <a href="{{ url('categories') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
    </form>
   
  </div>
</div>
 
@endsection