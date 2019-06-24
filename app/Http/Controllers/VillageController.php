<?php
namespace App\Http\Controllers;
use App\Village;
use Illuminate\Http\Request;
use App\Helpers\PCollection;
use DataTables;
class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages=Village::all()->load(['chef.user','commune.arrondissement.departement.region'])->paginate(10);
        return view('villages.index',compact('villages'));
    }
    public function list(Request $request)
    {
        $villages=Village::with(['chef.user','commune.arrondissement.departement.region'])->get();
        return DataTables::of($villages)->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        $village->delete();
        $message= $village->user->firstname.''.$village->user->name.'réussie';
        return redirect()->route('villages.index')->with(compact('message'));
    }
}
