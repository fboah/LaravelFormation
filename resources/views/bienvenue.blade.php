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
                                    <li class="breadcrumb-item"><a href="/">Tableau de Bord</a></li>
                                    <li class="breadcrumb-item active">Accueil</li>
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
                                    <div class="stat-icon dib"><i class="ti-shopping-cart color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Ventes</div>
                                        <div class="stat-digit">{{$nbventes}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>



                         <!-- Widget
                        
                        <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                            <div class="stat-icon bg-success">
                                <i class="ti-book color-success border-success"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-text">Livres</div>
                                <div class="stat-digit">{{$nblivres}}</div>
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                            <div class="stat-icon bg-primary">
                                <i class="ti-user color-primary border-primary"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-text">Auteurs</div>
                                <div class="stat-digit">{{$nbauteurs}}</div>
                            </div>
                            </div>
                        </div>
                        </div>


                     

                        <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                            <div class="stat-icon bg-warning">
                                <i class="ti-credit-card color-purple border-purple"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-text">Achats Fourn.</div>
                                <div class="stat-digit">{{$nbachats}}</div>
                            </div>
                            </div>
                        </div>
                        </div>
                     

                        <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three">
                            <div class="stat-icon bg-danger">
                                <i class="ti-link color-danger border-danger"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-digit">123</div>
                                <div class="stat-text">New User</div>
                            </div>
                            </div>
                        </div>
                        </div>
                        -->
                    </div>


                    <div class="row">
                       
                        <div class="col-lg-9">
                            <div class="card">

                                <div class="card-body">
                                  
                                
                                    <html>
                                    <head>
                                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                        <script type="text/javascript">
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {

                                            var data = google.visualization.arrayToDataTable([
                                                ['Titre', 'Quantité'],
                                                <?php echo $chartDataAut;  ?> 
                                            ]);

                                            var options = {
                                            title: 'Le Top 5 des Auteurs les plus prolifiques',
                                            is3D:'true'
                                            };

                                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                            chart.draw(data, options);
                                        }
                                        </script>
                                    </head>
                                    <body>
                                        <div id="piechart" style="width: 700px; height: 350px;"></div>
                                    </body>
                                    </html>
                               

                                </div>


                            </div>
                        </div>

                        <div class="col-lg-3">
                                    <div class="card">
                                    <div class=" bg-info mb-3">
                                        <div class="card-header">
                                             <h5>NOS AUTEURS</h5>
                                        </div>
                                    
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
                   
              
              
                        </section>
            </div>
        </div>

        @endsection