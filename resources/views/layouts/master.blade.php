<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     @yield('styles')
    <title>Agence Location</title>
  </head>
  <body>
    
   <div class="container my-3 border border-info">
    <div class="header h-50 bg-info rounded shadow-sm">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Accueil</a>
        </li>
        @auth
        <li class="nav-item">
        <a class="nav-link text-white" href="{{route('users.profile',auth()->user()->id)}}">
            {{ auth()->user()->name }}
          </a>
        </li>
        @if(auth()->user()->isAdmin())
        <li class="nav-item">
          <a class="nav-link text-white" href="#">
              Admin
            </a>
          </li>
          @endif
        <li class="nav-item">
          <form action="{{route('users.logout')}}" method="post">
            @csrf
            <button type="submit" class="nav-link text-white" style="background:transparent; border:none;">Déconnexion</button>
          </form>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('users.registre')}}">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('users.login')}}">Connexion</a>
        </li>
        @endauth
      </ul>
     </div>
       <div class="row">
           <div class="col-md-6 mx-auto my-4">
               @include('includes.messages')
           </div>
       </div>
       
      @yield('content')
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('scripts')  
</body>
</html>