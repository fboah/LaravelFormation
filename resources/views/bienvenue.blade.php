@extends('welcome')
@section('contentwelcome')
<div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Bonjour, <span>Bienvenue !</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-book color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Livres</div>
                                        <div class="stat-digit">{{$nblivres}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Auteurs</div>
                                        <div class="stat-digit">{{$nbauteurs}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-credit-card color-purple border-purple"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Achats Fourn.</div>
                                        <div class="stat-digit">{{$nbachats}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Referral</div>
                                        <div class="stat-digit">2,781</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       

                        <div class="col-lg-8">
                            <div class="card">

                                <div class="card-body">
                                    <div class="ct-pie-chart"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                                    <div class="card">
                                    <div class="card-title">
                                    <h4>NOS AUTEURS</h4>

                                </div>
                                        <div class="testimonial-widget-one p-17">
                                            <div class="testimonial-widget-one owl-carousel owl-theme">
                                              
                                                @foreach($auteurs as $item)
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        
                                                    <i class="fa fa-quote-left"></i>   <i class="fa fa-quote-right"></i>

                                                        <img class="testimonial-author-img"
                                                            src="/images/{{ $item->Image }}"  />
                                                        <div class="testimonial-author">{{ $item->Prenom }} {{ $item->Nom }}</div>
                                                      
                                                    </div>
                                                </div>
                                                @endforeach

                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>


                    </div>

                   
                  
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Fee Collections and Expenses</h4>

                                </div>
                                <div class="card-body">
                                    <div class="ct-bar-chart m-t-30"></div>
                                </div>
                            </div>
                        </div>

                   
                   
                                <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        @endsection