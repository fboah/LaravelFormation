@extends('welcome')
@section('contentwelcome')
 
<section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                <a href="{{ url('/auteurs/') }}" class="btn btn-success btn-sm" title="Retour Liste Auteur">
                            <i class="fa fa-back" aria-hidden="true"></i> Retour Liste Auteur
                        </a>
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="/images/{{ $auteurs->Image }}" width="1000px" alt="" />
                        </div>
                     
                        <div class="user-skill">
                          <h4>Ses Livres ({{$livreauteur->count()}})</h4>
                          <ul>
                         
                                @foreach($livreauteur as $item)
                                <li><a href="#">{{$item->Titre}}</a></li>
                                @endforeach

                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div  class="user-profile-name">{{ $auteurs->Prenom }}  {{ $auteurs->Nom }}</div>
                       
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Informations Personnelles</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">

                                <div class="birthday-content">
                                  <span class="contact-title">Anniversaire:</span>
                                  <span class="birth-date">{{ date('d-m-Y',strtotime($auteurs->DateNaissance)) }} </span>
                               
                                <div class="gender-content">
                                  <span class="contact-title">Sexe:</span>
                                    @if (($auteurs['Genre'])==0)
                                    <span class="gender">Homme</span>
                                    @else
                                    <span class="gender">Femme</span>
                                    @endif
                                   
                                </div>

                                </div>

                                <h4>Contacts</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Phone:</span>
                                  <span class="phone-number">{{ $auteurs->Telephone }}</span>
                                </div>
                              
                                <div class="email-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email">{{ $auteurs->Email }}</span>
                                </div>
                            
                              </div>
                              <div class="basic-information">
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /# row -->
       
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
               
              </div>
            </div>
          </div>
        </section>
@endsection