@extends('layouts.master')

@section('content')
  <div class="row my-4">
      <div class="col-md-4">
         <div class="card text-left">
             <img src="card-img-top" src="{{$user->image}}" alt="">
             <div class="card-body">
                 <h4 class="card-tile">{{$user->name}}</h4>
                 <p class="card-text d-flex flex-row align-items-center">
                     <span badge badge-primary mr-2>Téléphone : {{$user->tel}}</span>
                     <span badge badge-danger>Ville :  {{$user->ville}}</span>
                    </p>
             </div>
         </div>  
      </div> 
      <div class="col-md-8">
          <h2>Mes Commandes</h2>
          <table class="table">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>type</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Prix TTC</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->commands as $command)
                <tr>
                <td>{{App\Car::findOrFail($command->car_id)->marque}}</td>
                <td>{{App\Car::findOrFail($command->car_id)->type}}</td>
                <td>{{App\Car::findOrFail($command->car_id)->prixJ}}</td>
                <td>{{$command->dateL}}</td>
                <td>{{$command->dateR}}</td>
                <td>{{$command->prixTTC}}</td>
                <td></td>
               </tr>
                @endforeach
            </tbody>
          </table>
      </div>
  </div>
@endsection