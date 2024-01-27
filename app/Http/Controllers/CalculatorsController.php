<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CalculatorsController extends Controller
{
    public function home()
    {
        return view('/home');
    }

    public function calculateAge(Request $request)
    {
        //#1) Kada nije bitno koji je datum manji a koji veći
        // $pocetak = new DateTime($request->pocetak);
        // $kraj = new DateTime($request->kraj);
        // $interval = $pocetak->diff($kraj);
        // return back()->withInput()->with('rezultat', $interval->format('%y godina, %m meseci i %d dana'));


        //#2) Kada prvi datum mora biti veći onda ide sa validacijom

        $request->validate([
            'pocetak' => ['required', 'date', 'before:kraj'],
            'kraj' => ['required', 'date', 'after:pocetak']
        ]);
        $pocetak = new DateTime($request->pocetak);
        $kraj = new DateTime($request->kraj);
        $interval = $pocetak->diff($kraj);
        return back()->withInput()->with('rezultat', $interval->format('%y godina, %m meseci i %d dana'));
    }

    public function kamata(Request $request)
    {
        $data =  $request->validate([
            'dospijece' => ['required', 'date', 'before:kasnjenje'],
            'kasnjenje' => ['required', 'date', 'after:dospijece'],
            'vrijednost' => ['required', 'numeric'],
            'kamata' => ['required']
        ]);
        $dospijece = new DateTime($request->dospijece);
        $kasnjenje = new DateTime($request->kasnjenje);
        $vrijednost = $request->vrijednost;
        $interval = $dospijece->diff($kasnjenje);
        $dana = $interval->days;

        $result = ($dana * $vrijednost * $data['kamata']) / 100;
        return back()->withInput()->with('rezultatKamate', $result);
    }
}
