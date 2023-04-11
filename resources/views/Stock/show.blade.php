@extends('welcome')
@section('contentwelcome')
    <div class="container">
        <div class="row">
               
            
  <!-- /# column ->Titre -->
  <div class="col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h5> {{$StockLivreSite}} </h5>
                  
                </div>
                <div class="recent-comment">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="/images/maison.png" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">john doe</h4>
                      <p>Quantité :  {{$StockLivreSite}} </p>
                     
                      <p class="comment-date">{{$StockLivreSite}}</p>
                    </div>
                  </div>
                 
                
                </div>
              </div>
              <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
    </div>
@endsection