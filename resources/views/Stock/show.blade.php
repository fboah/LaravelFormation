@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
               
            
  <!-- /# column ->Titre -->
  <div class="col-lg-12">
          <div class="col-lg-6">
              <a href="{{ url('/stock/') }}" class="btn btn-success btn-sm" title="Retour Stock">
                            <i class="fa fa-back" aria-hidden="true"></i> Retour au Stock
              </a>
          </div>

              <div class="card">

              
              <div class="card-title">
              <h5>Titre :{{$NomLivre->Titre}} </h5>

              </div>
             
                @foreach($StockLivreSite as $item)
                <div class="recent-comment">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="/images/maison.png" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">{{$item->LibelleSite}}</h4>
                      
                      <p>Stock :  {{$item->QtiteStock}} </p>
                     
                      <p class="comment-date">{{$item->Ville}}</p>
                    </div>
                  </div>
                  @endforeach

                
                </div>
              </div>
              <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
    </div>
@endsection