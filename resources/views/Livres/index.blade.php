@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
               
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Livres</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/livres/create') }}" class="btn btn-success btn-sm" title="Ajouter un Nouveau Livre">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une Nouveau Livre
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre</th>
                                       
                                        <th>Catégorie</th>
                                        <th>DateParution</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($livres as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Titre }}</td>
                                        
                                        <td>{{ $item->Libelle }}</td>
                                        <td>{{ date('d-m-Y',strtotime($item->DateParution)) }}</td>
 
                                        <td>
                                           
                                            <a href="{{ url('/livres/' . $item->id . '/edit') }}" title="Modifier Oeuvre"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/livres' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Oeuvre" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection