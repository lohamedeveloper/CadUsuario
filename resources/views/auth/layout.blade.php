<!DOCTYPE html>
<html>
   <head>
      <title>Cadastro de Usuários</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <link   rel="stylesheet" href="css/style.css">
      <style type="text/css">
         @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
         <div class="container">
            <a class="navbar-brand" href="#">Cadastro de Usuários</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  @guest
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('Viewlogin') }}">Login</a>
                  </li>
                  @else
                  <li class="nav-item pl-4 pl-1">
                     <span class="navbar-text text-white">Olá <span class="k">{{ Auth::user()->name }}</span>!</span>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                  </li>
                  @endguest
               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
         <div class="meio">
            @yield('content')
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <!-- <script src="js/api/auth.js"></script> -->
   </body>
</html>