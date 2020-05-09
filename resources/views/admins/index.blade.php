@extends('layouts.master')

@section('content')
  <div class="row my-4">
    <div class="col-md-12">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addCar">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="bg-warning">
                        <tr>
                            <th>Id</th>
                            <th>Marque</th>
                            <th>Model</th>
                            <th>Type</th>
                            <th>Prix journée</th>
                            <th>Disponiblité</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($cars as $car)
                            <tr>
                             <td>{{$car->id}}</td>
                             <td>{{$car->marque}}</td>
                             <td>{{$car->model}}</td>
                             <td>{{$car->type}}</td>
                             <td>{{$car->prixJ}}</td>
                             <td>
                                 @if($car->dispo)
                                 <span class="badge badge-success">
                                     Disponible
                                 </span>
                                 @else
                                 <span class="badge badge-danger">
                                     Résérvé
                                 </span>
                                 @endif                                
                                </td>  
                             <td>
                              <img src="{{$car->image}}" width="60" height="60" class="img-fluid rounded">
                             </td>  
                             
                             <td class="d-flex flex-row justify-content-center">
                              <a href="{{route('cars.edit',$car->id)}}" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a> 
                          
                              <form action="{{route('cars.destroy',$car->id)}}" method="POST">
                                 @csrf
                                 {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>        

                            </form>  
                      </td>
                            </tr>    
                            @endforeach
                        
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {!! $cars->links() !!}
                </div>
            </div>
        </div>
    </div>
  </div>    
  <!-- Modal && Form de insertion -->
  <div class="modal fade" id="addCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une voiture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="marque">Marque*</label>
                <input type="text" class="form-control" name="marque" placeholder="Entrez Votre Marque ">
            </div>
            <div class="form-group">
                <label for="model">Model* </label>
                <input type="text" class="form-control" id="dateR" name="model" placeholder="Entrez Votre Date Model">
            </div>
            <div class="form-group">
              <label for="model">Type* </label>
              <select class="form-control" name="type">
                <option value="Essence">Essence</option>
                <option value="Diesel">Diesel</option>
              </select>
            </div>
            <div class="form-group">
              <label for="model">Prix journée* </label>
              <input type="number" class="form-control" name="prixJ" placeholder="Entrez Votre Prix Journér">
          </div>
          <div class="form-group">
            <label for="model" >Disponbile* </label>
            <select name="dispo" class="form-control">
              <option value="1">Oui</option>
              <option value="0">Non</option>
            </select>
          </div>
          <div class="form-group">
            <label for="model">Image* </label>
            <input type="file" class="form-control" name="image" placeholder="Choisir Votre Image">
         </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Ajouter</button>
            </div>
           </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection