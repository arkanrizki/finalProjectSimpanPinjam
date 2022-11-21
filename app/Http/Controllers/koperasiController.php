<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\koperasi;
use Illuminate\Support\Facades\Auth;



class koperasiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koperasi = koperasi::all();
        return view('read.koperasi', compact('koperasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKoperasi = koperasi::all();
        return view('create.koperasi', compact('dataKoperasi'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'npwp' => 'required',
            'nama_pimpinan' => 'required',
            'nama_bendahara' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
            'id_koperasi' => 'required',
        ]);

        koperasi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nama_bendahara' => $request->nama_bendahara,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'id_koperasi' => $request->id_koperasi,
            'created_by' => Auth::user()->name,
            'edited_by' => Auth::user()->name,
            'id_user' => Auth::user()->id
        ]);

        auth()->user()->assignRole('admin');

        return redirect('/home')->with('status', 'Anda berhasil terdaftar sebagai admin');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idkoperasi = DB::table('koperasi')
        ->join('users', 'koperasi.id_user', '=', 'users.id')
        ->where('users.id', Auth::user()->id)
        ->value('koperasi.id');
        return view('/read/koperasi', compact('koperasi', 'idkoperasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKoperasi = koperasi::all();
        return view('edit.koperasi', compact('koperasi', 'datakoperasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'npwp' => 'required',
            'nama_pimpinan' => 'required',
            'nama_bendahara' => 'required',
            'no_telpon' => 'required',
            'email' => 'required',
            'id_koperasi' => 'required',
        ]);

        koperasi::where('id', $koperasi->id)
        ->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nama_bendahara' => $request->nama_bendahara,
            'no_telpon' => $request->no_telpon,
            'email' => $request->email,
            'id_koperasi' => $request->id_koperasi,
            'created_by' => Auth::user()->name,
            'edited_by' => Auth::user()->name,
            'id_user' => Auth::user()->id
        ]);
    return redirect('/home')->with('status', 'Informasi anda berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        koperasi::destroy($koperasi->id);
        return redirect('/datakoperasi')->with('status', 'data berhasil dihapus');
    }
}
