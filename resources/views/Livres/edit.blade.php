@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Modifier un Livre</div>
  <div class="card-body">
      
      <form action="{{ url('livres/' .$livre->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$livre->id}}" id="id" />
        <label>Titre</label>
        <input type="text" name="Titre" id="Titre" value="{{$livre->Titre}}" class="form-control">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Catégorie</label>
          
            <select name="IdCategorie" class="form-control">
                @foreach ($categories as $item)
                <option @selected($item->id == $livre->IdCategorie)
                    value="{{ $item->id }}">{{ $item->Libelle }}</option>
                @endforeach
            </select>

        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Auteur</label>
            <select class="form-control" name="IdAuteur">
                @foreach($auteurs as $obj)
                
                <option @selected($obj->id == $livre->IdAuteur)
                    value="{{ $obj->id }}">{{$obj->Prenom}} {{$obj->Nom}}</option>
                @endforeach
             </select>

        </div>


        <label>Date Parution</label>       
        <input type="date" name="DateParution" id="DateParution" value="{{ date('Y-m-d',strtotime($livre->DateParution))}}" class="form-control">
      
        <input type="submit" value="Enregistrer" class="btn btn-success">
        <a href="{{ url('livres') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
    </form>
   
  </div>
</div>
 
@endsection