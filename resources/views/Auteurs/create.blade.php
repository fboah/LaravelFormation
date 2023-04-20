@extends('welcome')
@section('contentwelcome')


<div class="card">
  <div class="card-header">Ajouter un Auteur</div>
  <div class="card-body">
      
      <form action="{{ url('/auteurs') }}" method="post"  enctype="multipart/form-data">>
      
        @csrf
        <label>Nom</label>
        <input type="text" name="Nom" id="Nom" class="form-control">

        <label>Prenoms</label>
        <input type="text" name="Prenom" id="Prenom" class="form-control">

        <label>Date Naissance</label>
        <input type="date" name="DateNaissance" id="DateNaissance" class="form-control" value="<?php echo date('Y-m-d'); ?>">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Sexe</label>
            <select class="form-control" name="Genre">
               
                <option id="Genre" value="0">Homme</option>
                <option id="Genre" value="1">Femme</option>
              
             </select>

        </div>


        <label>Téléphone</label>
        <input type="text" name="Telephone" id="Telephone" class="form-control">


        <label>Email</label>
        <input type="email" name="Email" id="Email" class="form-control">

        <label>Photo</label>
        <input type="file" name="Image" id="Image" class="form-control">

        
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/auteurs') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection