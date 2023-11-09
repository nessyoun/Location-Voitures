<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::all();
        return view('admin.users',['users'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $role = $request->get('role');
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role'=> $role
        ]);
        return redirect()->back()->with('success', 'User enregistrée avec succès.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function clientsShow()
    {
        $clients = Client::all();
        return view('admin.clients',['clients'=>$clients]);
    }
    public function clientsDelete($id)
    {
        $client= Client::find($id);
        if($client){
            $client->delete();
        }
        return redirect()->back()->with('success', 'Client est supprimer avec succès.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.findusers',['user' => $user]);
    }

    public function profile() 
    {
        return view('admin/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $email = $request->get('email');
        $role = $request->get('role');
        $password = $request->get('new-password');
        $user = User::find($id);
        if(!$password){
            if($user){
                $user->name = $name;
                $user->email = $email;
                $user->role = $role;
                $user->save();
            }
        }
        else{
            if($user){
                $user->name = $name;
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->save();
            }
        }
  
        return redirect()->back()->with('success', 'Utilisateur restoré avec succès.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $password= "123456";
        $user = User::find($id);
        if($user){
            $user->password = bcrypt($password);
            $user->save();
        }
        return redirect()->back()->with('success', 'Utilisateur restoré avec succès.');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimer avec succès.');

    }

    public function reservationsParCilent($id)
    {
        $reservations = Reservation::where('cin',$id)->get();
        return view('client.reservations',['reservations'=>$reservations]);
    }
}
