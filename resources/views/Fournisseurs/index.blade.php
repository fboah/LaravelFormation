@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Fournisseurs</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/fournisseurs/create') }}" class="btn btn-success btn-sm" title="Ajouter une nouvelle Catégorie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Nouveau Fournisseur
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Libelle</th>
                                        <th>Tel</th>
                                        <th>Adresse</th>
                                        <th>Site Web</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($fournisseurs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Code }}</td>
                                        <td>{{ $item->Libelle }}</td>
                                        <td>{{ $item->Tel }}</td>
                                        <td>{{ $item->Adresse }}</td>
                                        <td>{{ $item->SiteWeb }}</td>
 
                                        <td>
                                          
                                            <a href="{{ url('/fournisseurs/' . $item->id . '/edit') }}" title="Modifier Fournisseur"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/fournisseurs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Fournissaur" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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