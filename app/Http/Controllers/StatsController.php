<?php

namespace App\Http\Controllers;
use App\Calendrier;
use App\Voiture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StatsController extends Controller
{
    public function index() {
        return view('admin.stats');
    }

    public function profitsByMounth() {
        $year = Carbon::now()->year; 
        $calendrier = Calendrier::where('year',$year)
        ->orderBy('id', 'desc')
        ->limit(6)
        ->get();
        $profits = new Collection();
        $labels = new Collection();
        $i=0;
        foreach($calendrier as $cal) 
        {
            $labels[$i]=$cal->mois;
            $reservations = $cal->reservations;
            $somme = 0.0;
            foreach($reservations as $res)
            {
                if($res->id_etat==1)
                    {$somme += $res->Voiture->prix;}
            }
            $profits[$i] = $somme;
            $i += 1;
        }
         return response()->json([
            'labels'=>$labels,
            'values'=>$profits
        ]);
    }

    public function rankCar()
    {
        $voitures = Voiture::all();
        $labels = array();
        $values = array();
        $i = 0;
        foreach($voitures as $vo)
        {
            $labels[$i] = $vo->modelVoiture->marqueOrigin->marque . " " . $vo->modelVoiture->model_voiture;
            $values[$i]=$vo->reservations->count();
            $i++;
        }
        return response()->json([
            'labels'=>$labels,
            'values'=>$values
        ]);
    }

    public function rankCarWithView()
    {
        $voiture = Voiture::withCount('reservations')->orderByDesc('reservations_count')->get();
        $voitures;
        $i=0;
        foreach($voiture as $vo)
        {
            if($vo->reservations_count!='0'){
                $voitures[$i]=$vo;
                $i++;
            }
                
        }
        return view("client.home",['voitures'=>$voitures,'milleur'=>true]);
    }

    public function newCars() {
        $voitures = Voiture::orderByDesc('date_mise_en_service')->get();
        return view("client.home",['voitures'=>$voitures,'newCar'=>true]);
    }
}
