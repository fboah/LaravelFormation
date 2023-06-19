@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Ventes</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/ventes/create') }}" class="btn btn-success btn-sm" title="Ajouter un Nouvel Achat Fournisseur">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Nouvelle Vente
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                       
                                        <th>Date Vente</th>
                                        <th>Livre</th>
                                        <th>Auteur</th>
                                        <th>Quantité</th>            
                                        <th>Site</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ventes as $item)
                                    <tr>
                                  
                                        <td>{{ date('d-m-Y',strtotime($item->DateVente)) }}</td>
                                        <td>{{ $item->Titre }}</td>
                                        <td>{{ $item->Prenom }} {{ $item->Nom }}</td>
                                        <td>{{ $item->Quantite }}</td>
                                       
                                        <td>{{ $item->LibelleSite }}</td>
                                      
                                        <td>
                                          
                                            <a href="{{ url('/ventes/' . $item->id . '/edit') }}" title="Modifier Vente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/ventes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Vente" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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