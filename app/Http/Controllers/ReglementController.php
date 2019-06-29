<?php

namespace App\Http\Controllers;
use App\Facture;
use App\Reglement;
use App\Compteur;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class ReglementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('reglements.index');
    }
    public function list(){
   
       $reglements=Reglement::get()->load('type','comptable','facture');
       return DataTables::of($reglements)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Facture $facture )
    {
        /* return $facture; */
        return view('reglements.create');
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
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function show(Reglement $reglement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglement $reglement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglement $reglement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglement $reglement)
    {
        //
    }
}
