@extends('layouts.master')

@section('content')
  <div class="row my-4">
      <div class="col-md-8 mx-auto">
        <div class="card border border-primary shadow-sm">
            <h3 class="card-header">Louer Cette Voiture</h3>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card border border-info">
                        <h3 class="text-info p-4">{{$car->marque}}</h3>
                          <div class="card-img-top">
                              <img src="{{$car ->image}}"  alt="" class="img-fluid rounded m-2">
                          </div>    
                    <div class="media-body">
                      <p class="d-flex flex-row justify-content-start">
                        <span class="badge badge-warning mx-3">Type :{{ $car->type}}</span>
                        <span class="badge badge-primary mr-3">Prix Journée :{{ $car->prixJ}}</span>
                      </p>
                    </div>
                     </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('commands.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="dateL">Date Début </label>
                        <input type="date" class="form-control" id="dateL" name="dateL" placeholder="Entrez Votre dateL ">
                    </div>
                    <div class="form-group">
                        <label for="dateR">Date Fin </label>
                        <input type="date" class="form-control" id="dateR" name="dateR" placeholder="Entrez Votre Date Retour">
                        <input type="hidden" name="car_id" value="{{$car->id}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Valider</button>
                    </div>
                </form>
            </div>
        </div>
        
      </div>   
  </div>
 
@endsection