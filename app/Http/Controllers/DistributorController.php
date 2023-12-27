<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors1 = Distributor::count();
        $distributors = Distributor::latest()->paginate(5);
    
        return view('distributors.index',compact('distributors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributors.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_distributor' => 'required',
            'name' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);
  
        Distributor::create($request->all());
     
        return redirect()->route('distributors.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distributor  $Distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
{
    $request->validate([
        'id_distributor' => 'required',
        'name' => 'required',
        'telp' => 'required',
        'alamat' => 'required', 
    ]);

    $distributor->update($request->all());

    return redirect()->route('distributors.index')
                    ->with('success', 'Data Berhasil Diubah');
}
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distributor  $Distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
     
        return redirect()->route('distributors.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
