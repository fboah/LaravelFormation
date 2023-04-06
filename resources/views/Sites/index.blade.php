@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
               
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gestion des Sites</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/sites/create') }}" class="btn btn-success btn-sm" title="Ajouter un Nouveau Livre">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un Nouveau Site
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Libelle</th>
                                        <th>Ville</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sites as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Libelle }}</td>
                                        <td>{{ $item->Ville }}</td>
                                 
                                        <td>
                                           
                                            <a href="{{ url('/sites/' . $item->id . '/edit') }}" title="Modifier Site"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
 
                                            <form method="POST" action="{{ url('/sites' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer Site" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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