@extends('layouts.master')

@section('content')
  <div class="row my-4">
      <div class="col-md-4">
          <div class="card bg-light border border-primary">
              <h3 class="card-header">
                  Recherche
              </h3>
              <div class="card-body">
              <form action="{{route('cars.index')}}" method="post">
                @csrf
                      <div class="form-group">
                          <label for="search">Recherche</label>
                          <input type="text" class="form-control" id="search"  placeholder="Enter Recherche">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Valider</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="col-md-8">
          <div class="card border border-info">
              <h3 class="card-header">{{$car->marque}}</h3>
                <div class="card-img-top">
                    <img src="{{$car ->image}}"  alt="" class="img-fluid rounded m-2">
                </div>    
                     <div class="media-body">
                            <p class="d-flex flex-row justify-content-start">
                            <span class="badge badge-warning mx-3">Type :{{ $car->type}}</span>
                            <span class="badge badge-primary mr-3">Prix Journée :{{ $car->prixJ}}</span>
                            @if($car->dispo)
                              @auth
                                <p>
                                <a href="{{route('command.create', $car->id)}}" class="btn btn-primary mx-3">Réserver</a>
                                </p>
                              @else
                                <p>
                                  <a href="{{route('users.login')}}" class="btn btn-primary">Réserver</a>
                                </p>                              @endauth
                            @else
                            <span class="badge badge-danger">
                               Réservé
                             </span>
                            @endif
                       </p>
       
              </div>
          </div>
      </div>

      
  </div>
 
@endsection