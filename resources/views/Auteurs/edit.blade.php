@extends('welcome')
@section('contentwelcome')


<div class="card">
  <div class="card-header">Ajouter un Auteur</div>
  <div class="card-body">
      
      <form action="{{ url('auteurs/' .$auteur->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        @csrf
        <label>Nom</label>
        <input type="text" name="Nom" id="Nom" value="{{$auteur->Nom}}" class="form-control">

        <label>Prenoms</label>
        <input type="text" name="Prenom" id="Prenom" value="{{$auteur->Prenom}}" class="form-control">

        <label>Date Naissance</label>
        <input type="date" name="DateNaissance" id="DateNaissance" value="{{ date('Y-m-d',strtotime($auteur->DateNaissance))}}" class="form-control">
       
        <div class="form-group">
            <label for="exampleFormControlSelect1">Sexe</label>
            <select class="form-control" name="Genre">
                <option @selected($auteur->Genre == 0)   value="0" >Homme</option>
                <option @selected($auteur->Genre == 1)   value="1">Femme</option>

             </select>

        </div>


        <label>Téléphone</label>
        <input type="text" name="Telephone" id="Telephone" value="{{$auteur->Telephone}}" class="form-control">


        <label>Email</label>
        <input type="email" name="Email" id="Email" value="{{$auteur->Email}}" class="form-control">

        <label>Photo</label>
        <input type="file" name="Image" id="Image" value="{{$auteur->Image}}" class="form-control">

        
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/auteurs') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection