@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Achats Fournisseur</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/achats/create') }}" class="btn btn-success btn-sm" title="Ajouter un Nouvel Achat Fournisseur">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Nouvel Achat Fournisseur
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                 
                                        <th>Date Achat</th>
                                        <th>Fournisseur</th>
                                        <th>Livre</th>
                                        <th>Auteur</th>
                                        <th>Quantité</th>
                                        <th>Num Facture</th>
                                    
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($achats as $item)
                                    <tr>
                                      
                                        <td>{{ date('d-m-Y',strtotime($item->DateAchat)) }}</td>
                                        <td>{{ $item->LibelleFournisseur }}</td>
                                        <td>{{ $item->Titre }}</td>
                                        <td>{{ $item->Prenom }} {{ $item->Nom }}</td>
                                        <td>{{ $item->Quantite }}</td>
                                        <td>{{ $item->NumFacture }}</td>
                                      
 
                                        <td>
                                          
                                            <a href="{{ url('/achats/' . $item->id . '/edit') }}" title="Modifier Categorie"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/achats' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Achat" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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