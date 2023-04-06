@extends('welcome')
@section('contentwelcome')

<div class="card">
  <div class="card-header">Ajouter un Site</div>
  <div class="card-body">
      
      <form action="{{ url('/sites') }}" method="post">
        {!! csrf_field() !!}
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" class="form-control">


        <div class="form-group">
            <label for="exampleFormControlSelect1">Ville</label>
            <select class="form-control" name="IdVille">
                @foreach($villes as $item)
                <option id="IdVille" value="{{$item->id}}">{{$item->Ville}}</option>
                @endforeach
             </select>

        </div>

        
        <input type="submit" value="Enregistrer" class="btn btn-success">

        <a href="{{ url('/sites') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
       
    </form>
   
  </div>
</div>
 
@endsection