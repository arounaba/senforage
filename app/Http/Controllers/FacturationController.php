<?php
namespace App\Http\Controllers;
use App\Facturation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class FacturationController extends Controller
{
    public function list(Request $request)
    {
        $facturations=Facturation::get()->load('user');
        return Datatables::of($facturations)->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('facturations.index');
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
        $village_id=$request->input('village');
        $village=\App\Village::find($village_id);
        return view('facturations.create',compact('village'));
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
        return view('facturations.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Facturation $facturation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Facturation $facturation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facturation $facturation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facturation $facturation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facturation $facturation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facturation $facturation)
    {
        //
    }
}
