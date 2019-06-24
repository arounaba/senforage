<?php

namespace App\Http\Controllers;

use App\Reglement;
use Illuminate\Http\Request;

class ReglementController extends Controller
{
        public function list(Request $request)
        {
            $reglements=Reglement::get()->load('user');
            return Datatables::of($reglements)->make(true);
        }
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
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request)
        {
            //
            // $this->validate(
            //     $request, [
            //         'village' => 'required|exists:villages,id',
            //     ]);
            /* $village_id=$request->input('village');
            $village=\App\Village::find($village_id);
            return view('gestionnaires.create',compact('gestionnaire')); */
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
            $this->validate(
                $request, [
                    'nom' => 'required|string|max:50',
                    'prenom' => 'required|string|max:50',
                    'email' => 'required|email|max:255|unique:users,email',
                    'password' => 'required|string|max:50',
                    'village' => 'required|exists:villages,id',
                ]
            );
            return view('reglements.index');
            
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reglement $reglement
     * @return \Illuminate\Http\Response
     */
    public function show(Reglement $reglement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglement $reglement
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
     * @param  \App\Reglement $reglement
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
        $reglement->delete();
        $message= $reglement->user->firstname.''.$reglement->user->name.'réussie';
        return redirect()->route('reglements.index')->with(compact('message'));
    }
}
