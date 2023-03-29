@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Informations Catégorie</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Libelle : {{ $categories->Libelle }}</h5>
        <p class="card-text">Description : {{ $categories->Description }}</p>
      
  </div>
       
  
  </div>
</div>

@endsection