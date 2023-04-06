@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Auteurs</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/auteurs/create') }}" class="btn btn-success btn-sm" title="Ajouter une nouvel Auteur">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une Nouvel Auteur
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Prenoms</th>
                                        <th>Nom</th>
                                        <th>Date Naissance</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($auteurs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="/images/{{ $item->Image }}" width="20px"></td>                                     
                                        <td>{{ $item->Prenom }}</td>
                                        <td>{{ $item->Nom }}</td>
                                        <td>{{ date('d-m-Y',strtotime($item->DateNaissance)) }}</td>
                                        <td>{{ $item->Telephone }}</td>
                                        <td>{{ $item->Email }}</td>
 
                                        <td>
                                            <a href="{{ url('/auteurs/' . $item->id) }}" title="Consulter infos Auteur"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/auteurs/' . $item->id . '/edit') }}" title="Modifier Auteur"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/auteurs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Categorie" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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