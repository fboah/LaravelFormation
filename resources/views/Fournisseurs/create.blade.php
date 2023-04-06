@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter un Fournisseur</div>
  <div class="card-body">
      
      <form action="{{ url('fournisseurs') }}" method="post">
        {!! csrf_field() !!}

        <label>Code</label>
        <input type="text" name="Code" id="Code" class="form-control">
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" class="form-control">
      
        <label>Tel</label>
        <input type="text" name="Tel" id="Tel" class="form-control">
        <label>Adresse</label>
        <input type="text" name="Adresse" id="Adresse" class="form-control">
        <label>Site Web</label>
        <input type="text" name="SiteWeb" id="SiteWeb" class="form-control">



        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('fournisseurs') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection