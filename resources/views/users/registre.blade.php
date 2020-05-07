@extends('layouts.master')

@section('content')
  <div class="row my-4">
      <div class="col-md-8 mx-auto">
        <div class="card border border-primary shadow-sm">
            <h3 class="card-header">Inscription</h3>
            <div class="card-body">
                <form action="{{ route('users.registre')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Nom et Prénom </label>
                        <input type="text" class="form-control" id="email" name="name" placeholder="Entrez Votre Nom et Prénom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez Votre Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="search" name="password"  placeholder="Entrez Votre Password">
                    </div>
                    <div class="form-group">
                        <label for="email">Téléphone </label>
                        <input type="text" class="form-control" id="email" name="tel" placeholder="Entrez Votre Téléphone">
                    </div>
                    <div class="form-group">
                        <label for="email">Ville</label>
                        <input type="text" class="form-control" id="email" name="ville" placeholder="Entrez Votre Ville">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Registre</button>
                    </div>
                </form>
            </div>
        </div>
        
      </div>   
  </div>
 
@endsection