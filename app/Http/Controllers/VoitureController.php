<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;

use App\Voiture;
use App\ModelVoiture;
use App\Agence;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voiture = Voiture::all();
        //dd($voiture);
        return  view('admin.consultervoiture',['voiture'=>$voiture]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = ModelVoiture::all();
        $agences = Agence::all();
        return view('admin.ajoutervoiture',['models'=>$models, 'agences'=>$agences]);
    }

    public function ajouter(Request $request)
    {

    // Enregistrement de la voiture dans la base de données
    $voiture = new Voiture;
    $voiture->date_mise_en_service = $request->input('date_de_mise_en_service');
    $voiture->prix = $request->input('prix');
    $voiture->model = $request->input('model');
    $voiture->id_agence = $request->input('agence');
    // Traitement des images
    if ($request->hasFile('mainimage')) {
        $mainImage = $request->file('mainimage');
        $mainImageName = 'main_image_' . time() . '.' . $mainImage->getClientOriginalExtension();
        $mainImage->storeAs('public/img', $mainImageName);
    
        // To make the file accessible via a URL, create a symbolic link
        // This is needed because files in the `storage/app/public` directory are not directly accessible
        // You only need to create the link once, usually during deployment or setup
        // Run this command to create the symbolic link: php artisan storage:link
        $mainImageName = "/storage/img/". $mainImageName;
        $voiture->main_image = $mainImageName;
    }
    


    // Traitement des images supplémentaires
    $imagesNmaes = "";


        foreach ($request->file('images') as $image) {
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
            $imageName = "/storage/img/".$imageName;
            $imagesNmaes = $imagesNmaes.",".$imageName;
        }


    $voiture->images = $imagesNmaes;

    $voiture->save();
    return redirect()->route('voitures.consulter')->with('success', 'Voiture enregistrée avec succès.');
    

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $res = Voiture::where('id', $id)->first();
        return view('admin.consulterunevoiture',['voiture' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $prix = $request->get('prix');
        $voiture = Voiture::find($id);
        if($voiture)
        {
            $voiture->prix = $prix;
            $voiture->save();
        }
        return redirect()->back()->with('success', 'Voiture enregistrée avec succès.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
{
    $id = $request->get('voit');
    
    $results1 = Voiture::where('date_mise_en_service', $id)
        ->orWhere('prix', $id)
        ->get();
    
    $results2 = Voiture::whereHas('modelVoiture', function($q) use ($id) {
        $q->where('model_voiture', 'like', '%' . $id . '%')
            ->orWhereHas('marqueOrigin', function ($p) use ($id) {
                $p->where('marque', 'like', '%' . $id . '%');
            });
    })->get();
    
    $results = $results1->merge($results2);
    
    return view('admin.consultervoiture', ['voiture' => $results]);
}

public function findForclient(Request $request)
{
    $id = $request->get('voit');
    
    $results1 = Voiture::where('date_mise_en_service', $id)
        ->orWhere('prix', $id)
        ->get();
    
    $results2 = Voiture::whereHas('modelVoiture', function($q) use ($id) {
        $q->where('model_voiture', 'like', '%' . $id . '%')
            ->orWhereHas('marqueOrigin', function ($p) use ($id) {
                $p->where('marque', 'like', '%' . $id . '%');
            });
    })->get();
    
    $results = $results1->merge($results2);
    
    return view('client.home', ['voitures' => $results]);
}

public function dateEstDansIntervalle($date_debut, $date_fin) {
    
    // Obtenez la date actuelle
    $date_actuelle =  Carbon::now();

    // Vérifiez si la date actuelle est entre date_debut et date_fin
    return $date_actuelle >= $date_debut && $date_actuelle <= $date_fin;
}

public function showDetails($id) {
    $voiture = Voiture::find($id);
    if ($voiture){
        $res = $voiture->reservations;
        $etat = "Disponible";
        if($res){
            foreach ($res as $r)
            {
                if($r->id_etat=='1'){
                    if($this->dateEstDansIntervalle($r->date_debut, $r->date_fin)){
                        $etat = "Occupée";
                        break;
                    }
                }
             
            }
        }
        $images = explode(',', $voiture->images);
    
    }
    return view("client.consulter",['voiture'=>$voiture,'etat'=>$etat,'images'=>$images]);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voiture = Voiture::find($id);
        $voiture->delete();
        return redirect()->back()->with('success', 'Voiture enregistrée avec succès.');
    }
}
