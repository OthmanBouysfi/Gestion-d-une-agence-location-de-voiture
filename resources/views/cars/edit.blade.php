@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 mx-auto">
                <div class="card bg-light">
                    <h3 class="card-header">Modifier une voiture</h3>
                    <div class="card-body">
                        <form action="{{route('cars.update',$car->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                                <div class="form-group">
                                    <label for="marque">Marque*</label>
                                <input type="text" value="{{$car->marque}}" name="marque" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="model">Model*</label>
                                    <input type="text" value="{{$car->model}}" name="model" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type*</label>
                                    <select name="type" class="form-control" id="">
                                        <option>Veuillez choisir un type</option>
                                        <option value="Essence" {{$car->type == 'Essence' ? 'selected' : ''}}>Essence</option>
                                        <option value="Diesel" {{$car->type == 'Diesel' ? 'selected' : ''}}>Diesel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prixJ">Prix Journée*</label>
                                    <input type="number" value="{{$car->prixJ}}" name="prixJ" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="dispo">Dispinible*</label>
                                    <select name="dispo" class="form-control" id="">
                                        <option>Veuillez choisir une option</option>
                                        <option value="1" {{$car->dispo ? 'selected' : ''}}>Oui</option>
                                        <option value="0" {{$car->dispo ? 'selected' : ''}}>Non</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <img src="{{$car->image}}" width="100" height="100" class="img-fluid rounded">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image*</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <button class="btn btn-info" type="submit">Valider</button>
                           </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection