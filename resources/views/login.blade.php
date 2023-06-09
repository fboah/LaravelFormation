<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bibliothèque en Ligne</title>

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
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                      
                        <div class="login-form">
                            <h4>Login</h4>
                            <div>
                                    @if(session()->has('success'))

                                    <div class="alert alert-success">
                                    {{session()->get('success')}}
                                    </div>
                                   
                                    @endif
                                </div>
                            <form action="{{ url('/login') }}" method="post">
                            {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email"  placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"  placeholder="Password">
                                </div>

                                <div>
                                    @if(session()->has('error'))

                                    <div class="alert alert-danger">
                                    {{session()->get('error')}}
                                    </div>
                                   
                                    @endif
                                </div>


                                <div class="checkbox">
                                   
                                    <label class="pull-right">
										<a href="{{ url('/') }}">Consulter nos stocks et Achetez!</a>
									</label>

                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-10 m-t-10">Se Connecter</button>
                              
                                <div class="register-link m-t-15 text-center">
                                    <p>Vous n'avez pas de compte ? <a href="{{ url('/registration') }}"> Enregistrez-vous ici</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>