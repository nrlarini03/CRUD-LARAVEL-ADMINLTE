<?php
  
namespace App\Http\Controllers;
  
use App\Models\Pegawai;
use Illuminate\Http\Request;
  
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Pegawai::count();
        $pegawais = Pegawai::latest()->paginate(5);
    
        return view('pegawais.index',compact('pegawais','staffs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawais.create');
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
            'name' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'jab' => 'required',
        ]);
  
        Pegawai::create($request->all());
     
        return redirect()->route('pegawais.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view('pegawais.show',compact('pegawai'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawais.edit',compact('pegawai'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'jab' => 'required',
        ]);
  
        $input = $request->all();
  
        $pegawai->update($input);
    
        return redirect()->route('pegawais.index')
                        ->with('success','Data Berhasil Diubah');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
     
        return redirect()->route('pegawais.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}