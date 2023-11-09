<?php

namespace App\Http\Controllers;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Calendrier;

class CalendrierController extends Controller
{
    public function index() {
        $reservations = Reservation::all();
        $i=0;
        foreach($reservations as $res) {
            if($res->id_etat=='1')
                $reservation[$i] = $res;
                $i++;
        }
        return view('admin.calendrier',['reservation' => $reservation]);
    }

    public function reserver(Request $request)
    {
        $cin = $request->get('cin');
        $voiture = $request->get('voiture');
        $date_debut = $request->get('date_debut');
        $date_fin = $request->get('date_fin');
        $date_creation = Carbon::now();
        $currentClandrier = Calendrier::orderBy('id', 'desc')->first();
        $idCalendrier = $currentClandrier->id;
        $reservation = new Reservation;
        $reservation->cin = $cin;
        $reservation->voiture = $voiture;
        $reservation->date_de_creation = $date_creation;
        $reservation->date_debut = $date_debut;
        $reservation->date_fin = $date_fin;
        $reservation->idCalendrier	=  $idCalendrier;
        $reservation->id_etat = '3';
        $reservation->save();
        return redirect()->back()->with('success', 'Votre demande est bien enregistrée');

    }

    public function annulerReservation($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation)
        {
            $reservation->id_etat='2';
            $reservation->date_fin  = null;
            $reservation->save();
        }
        return redirect()->back()->with('success', 'Votre demande est bien supprimée');

    }

    public function demandes(){
        $reservation = Reservation::where('id_etat','3')
        ->orderByDesc('date_de_creation')
        ->get();
        return view('admin.demandes',['reservations'=>$reservation]);
    }

    public function approuver($id){
        $reservation = Reservation::find($id);
        if ($reservation)
        {
            $reservation->id_etat='1';
            $reservation->save();
        }
        return redirect()->back()->with('success', 'Votre demande est bien supprimée');

    }
}
