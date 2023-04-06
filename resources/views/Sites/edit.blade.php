@extends('welcome')
@section('contentwelcome')
 
<div class="card">
  <div class="card-header">Modifier un Site</div>
  <div class="card-body">
      
      <form action="{{ url('sites/' .$site->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$site->id}}" id="id" />
        <label>Libelle</label>
        <input type="text" name="Libelle" id="Libelle" value="{{$site->Libelle}}" class="form-control">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Ville</label>
          
            <select name="IdVille" class="form-control">
                @foreach ($villes as $item)
                <option @selected($item->id == $site->IdVille)
                    value="{{ $item->id }}">{{ $item->Ville }}</option>
                @endforeach
            </select>

        </div>


        <input type="submit" value="Enregistrer" class="btn btn-success">
        <a href="{{ url('sites') }}" class="btn btn-danger" role="button" aria-pressed="true">Annuler</a>
    </form>
   
  </div>
</div>
 
@endsection