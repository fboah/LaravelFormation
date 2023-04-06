@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Modifier un Fournisseur</div>
  <div class="card-body">
      
      <form action="{{ url('fournisseurs/' .$fournisseur->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$fournisseur->id}}" id="id" />
        
        <label>Code</label>
        <input type="text" name="Code" id="Code" value="{{$fournisseur->Code}}" class="form-control">
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" value="{{$fournisseur->Libelle}}" class="form-control">
      
        <label>Tel</label>
        <input type="text" name="Tel" id="Tel" value="{{$fournisseur->Tel}}" class="form-control">
        <label>Adresse</label>
        <input type="text" name="Adresse" id="Adresse" value="{{$fournisseur->Adresse}}" class="form-control">
        <label>Site Web</label>
        <input type="text" name="SiteWeb" id="SiteWeb" value="{{$fournisseur->SiteWeb}}" class="form-control">




        <input type="submit" value="Enregistrer" class="btn btn-success">
        <a href="{{ url('categories') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
    </form>
   
  </div>
</div>
 
@endsection