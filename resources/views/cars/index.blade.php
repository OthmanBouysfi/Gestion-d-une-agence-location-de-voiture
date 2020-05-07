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
                          <input type="text" class="form-control" name="search"  placeholder="Enter Recherche">
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
              <h3 class="card-header">{{$title}} <span badge badge-badge-primary>{{$count}}</span></h3>
              <div class="card-body">
                 @foreach($cars as $car)
                 
                 <div class="media mb-2 ">
                     <div class="media-left">
                     <img src="{{$car ->image}}" width="100" height="100" alt="" class="img-fluid rounded-circle">
                     </div>
                     <div class="media-body">
                        <h3 class="text-info">
                        <a href="{{route('cars.show', $car->id)}}" class="btn btn-link">
                                {{$car->marque}}
                            </a></h3>
                            <p class="d-flex flex-row justify-content-start">
                            <span class="badge badge-warning mx-3">Type :{{ $car->type}}</span>
                            <span class="badge badge-primary mr-3">Prix Journée :{{ $car->prixJ}}</span>
                            @if($car->dispo)
                              <span class="badge badge-success">
                                 Disponible
                              </span>
                            @else
                            <span class="badge badge-danger">
                               Réservé
                             </span>
                            @endif
                            </p>
                     </div>
                 </div>
                 <hr>
                 @endforeach
              </div>
              <div class="d-flex justify-content-center">
                  {!! $cars->links() !!}
              </div>
          </div>
      </div>

      
  </div>
 
@endsection