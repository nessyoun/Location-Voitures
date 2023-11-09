<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voiture;
use App\Client;
use App\Reservation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $voitures = Voiture::all();
        $nbvoitures = Voiture::all()->count();
        $encours = Reservation::whereHas('etat', function($q) {
            $q->where('etat', 'En cours');
        })->count();
        $enattentes = Reservation::whereHas('etat', function($q) {
            $q->where('etat', 'En attente');
        })->count();
        $annules = Reservation::whereHas('etat', function($q) {
            $q->where('etat', 'Annulées');
        })->count();
        $nbClients = Client::all()->count();
        if ($request->user() && $request->user()->hasRole('admin')) {
            return view('admin.admindashbord',['clts'=>$nbClients,'vtr'=>$nbvoitures,'encours'=>$encours,'annules'=>$annules,'enatt'=>$enattentes,'somme'=>$this->profits()]);
        } elseif ($request->user() && $request->user()->hasRole('commercial')) {
            return view('comercial.home');
        } else {
            return view('client.home',['voitures'=>$voitures]);
        }
    }

    private function profits(){
        $somme = 0.0;
        $encours = Reservation::whereHas('etat', function($q) {
            $q->where('etat', 'En cours');
        })->get();

        foreach($encours as $en)
        {
            $somme += $en->Voiture->prix;
        }
        return $somme;
    }
}
