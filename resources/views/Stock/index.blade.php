@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
               
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Stock Bibliothèque</h2>
                    </div>
                    <div class="card-body">
                      
                        <br/>
                        <br/>
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titre Livre</th>
                                        <th>Quantité</th>
                                        <th>Actions</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Listeachats as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Titre }}</td>
                                        <td>{{ $item->QtiteStock }}</td>
                                 
                                        <td>
                                           
                                        <a href="{{ url('/stock/' . $item->IdLivre) }}" title="Consulter Disponibilité Livre"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/ventes/create') }}" title="Acheter Livre"><button class="btn btn-success btn-sm"><i class="fa fa-credit-card" aria-hidden="true"></i> </button></a>
 
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