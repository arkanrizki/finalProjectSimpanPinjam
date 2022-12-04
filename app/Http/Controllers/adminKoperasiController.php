<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\koperasi;
use Illuminate\Support\Facades\DB;

class adminKoperasiController extends Controller
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
        $koperasi = DB::table('koperasi')
            ->get();
            // dd($koperasi[1]->id);
            // dd($koperasi);
        return view(
            'admin.koperasi.index',
            [
                'koperasi' => $koperasi
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.koperasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $koperasi = DB::table('koperasi')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nama_bendahara' => $request->nama_bendahara,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);
        if ($koperasi) {
            return redirect('admin-dashboard/koperasi')
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/koperasi')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $koperasi = koperasi::findOrFail($id);
        return view('admin.koperasi.edit', compact('koperasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $koperasi = koperasi::findOrFail($id);
        
        $koperasi = $koperasi->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'npwp' => $request->npwp,
            'nama_pimpinan' => $request->nama_pimpinan,
            'nama_bendahara' => $request->nama_bendahara,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ]);
        // dd($coba);
        if ($koperasi) {
            return redirect('admin-dashboard/koperasi')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('admin-dashboard/koperasi')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $koperasi = koperasi::findOrFail($id);
        $koperasi->delete();

        if ($koperasi) {
            return redirect('admin-dashboard/koperasi')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/koperasi')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
