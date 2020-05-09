<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
         if($request->search !== null){
             $cars = Car::orderBy('created_at', 'DESC')->whereMarque($request->search)->paginate(5);
            return view('cars.index')->with(
                ['cars'=>$cars,
                'title' => "Resultat trouvés pour : " .$request->search,
                'count' =>  $cars->count()
                
                ]);
         }else{
             $cars = Car::all();
            return view('cars.index')->with(
                ['cars'=>Car::paginate(5),
                'title' => "Toutes les voitures",
                'count' =>  $cars->count()]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'marque' => 'required',
            'model' => 'required',
            'type' => 'required',
            'prixJ' => 'required',
            'dispo' => 'required',
            'image' => 'required'
        ]);

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'),$name);

        Car::create([
            'marque' => $request->marque,
            'model' => $request->model,
            'type' => $request->type,
            'prixJ' => $request->prixJ,
            'dispo' => $request->dispo,
            'image' => '/images/' .$name

        ]);
        return redirect()->route('admins.index')->withSuccess('Voiture ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show')->withCar($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit')->withCar($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $this->validate($request,[
            'marque' => 'required',
            'model' => 'required',
            'type' => 'required',
            'prixJ' => 'required',
            'dispo' => 'required',
        ]);
        $image = $car->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
            $image = '/images/' . $name;
        }
        $car->update([
            'marque' => $request->marque,
            'model' => $request->model,
            'type' => $request->type,
            'prixJ' => $request->prixJ,
            'dispo' => $request->dispo,
            'image' => $image

        ]);
        return redirect()->route('admins.index')->withSuccess('Voiture Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admins.index')->withSuccess('Voiture Supprimé');

    }
}
