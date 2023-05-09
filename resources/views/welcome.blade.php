<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Bibliothèque Virtuelle</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

 <!-- Styles -->
 <link href="{{ asset('css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



</head>



<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="{{ url('/') }}">
                            <!-- <img src="images/logo.png" alt="" /> --><span>BIBLIOTHEQUE</span></a></div>
                    <li class="label">Main</li>
                    <li><a href="{{ url('/') }}"><i class="ti-home"></i> Tableau de Bord  </a>
                    
                    </li>

                   
                    <li class="label">Création</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid2-alt"></i> Modèles <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                        <li><a href="{{ url('/fournisseurs') }}" ><i class="ti-id-badge"></i> Fournisseurs </a></li>
                        <li><a href="{{ url('/categories') }}" ><i class="ti-wallet"></i> Catégorie </a></li>
                        <li><a href="{{ url('/livres') }}" ><i class="ti-book"></i> Livre </a></li>
                        <li><a href="{{ url('/auteurs') }}" ><i class="ti-user"></i> Auteur </a></li>
                        <li><a href="{{ url('/sites') }}" ><i class="ti-world"></i> Sites </a></li>
                      
                        </ul>
                    </li>
                  
                    
                 
                    <li class="label">Transactions</li>
                   
                    <li><a href="{{ url('/stock') }}"><i class="ti-package"></i> Stock</a></li>
                   
                    <li><a href="{{ url('/achats') }}"><i class="ti-credit-card"></i> Achats Fourn</a></li>
                  
                    <li><a href="{{ url('/ventes') }}"><i class="ti-agenda"></i> Ventes</a></li>


                    <li class="label">Analyses</li>
                  
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Statistiques <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                        <li><a href="{{ url('/StatByAuteur') }}" ><i class="ti-user"></i> Auteurs </a></li>
                        <li><a href="{{ url('/StatByAgence') }}" ><i class="ti-credit-card"></i> Agences</a></li>
                        <li><a href="{{ url('/sites') }}" ><i class="ti-agenda"></i> Ventes </a></li>
                      
                      
                        </ul>
                    </li>


                    <li class="label">Features</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>

                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>

                            <li><a href="ui-list-group.html">List Group</a></li>

                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>

                        </ul>
                    </li>

                   
                    <li><a href="{{ url('/logout') }}" ><i class="ti-close"></i> Deconnexion</a></li>
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->
    
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">

                        <li>
                             <a href="{{ url('/logout') }}">
                             <i class="ti-power-off"></i>
                              <span>Se Déconnecter</span>
                              </a>
                        </li>
                                         
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">

                            <span class="user-avatar">{{Auth::user()->name}}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>

                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                              
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                           
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('/logout') }}">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>

                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <div class="content-wrap">
       @yield('contentwelcome')
    </div>

    <!-- jquery vendor -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('js/lib/calendar-2/pignose.init.js') }}"></script>


    <script src="{{ asset('js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('js/dashboard2.js') }}"></script>

    <!-- Data Table-->
    <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/datatables-init.js') }}"></script>



</body>

</html>
