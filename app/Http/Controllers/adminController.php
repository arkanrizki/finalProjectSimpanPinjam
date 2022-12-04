<?php

namespace App\Http\Controllers;

use App\Models\koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    // public function index()
    // {
    //     $koperasi = DB::table('koperasi')
    //         ->get();
    //         // dd($koperasi[1]->id);
    //         // dd($koperasi);
    //     return view(
    //         'admin.koperasi.index',
    //         [
    //             'koperasi' => $koperasi
    //         ]
    //     );
    // }

    // public function create()
    // {
    //     return view('admin.koperasi.create');
    // }

    // public function store(Request $request)
    // {        
    //     $koperasi = DB::table('koperasi')->insert([
    //         'nama' => $request->nama,
    //         'alamat' => $request->alamat,
    //         'npwp' => $request->npwp,
    //         'nama_pimpinan' => $request->nama_pimpinan,
    //         'nama_bendahara' => $request->nama_bendahara,
    //         'no_telp' => $request->no_telp,
    //         'email' => $request->email,
    //     ]);
    //     if ($koperasi) {
    //         return redirect('admin-dashboard/koperasi')
    //             ->with([
    //                 'success' => 'Post has been added successfully'
    //             ]);
    //     } else {
    //         return redirect('admin-dashboard/koperasi')
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem has occured, please try again'
    //             ]);
    //     }
    // }

    // public function edit($id)
    // {
    //     $koperasi = koperasi::findOrFail($id);
    //     return view('admin.koperasi.edit', compact('koperasi'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $koperasi = koperasi::findOrFail($id);
        
    //     $koperasi = $koperasi->update([
    //         'nama' => $request->nama,
    //         'alamat' => $request->alamat,
    //         'npwp' => $request->npwp,
    //         'nama_pimpinan' => $request->nama_pimpinan,
    //         'nama_bendahara' => $request->nama_bendahara,
    //         'no_telp' => $request->no_telp,
    //         'email' => $request->email,
    //     ]);
    //     // dd($coba);
    //     if ($koperasi) {
    //         return redirect('admin-dashboard/koperasi')
    //             ->with([
    //                 'success' => 'Post has been updated successfully'
    //             ]);
    //     } else {
    //         return redirect('admin-dashboard/koperasi')
    //             ->back()
    //             ->withInput()
    //             ->with([
    //                 'error' => 'Some problem has occured, please try again'
    //             ]);
    //     }
    // }
    // public function delete($id)
    // {
    //     $koperasi = koperasi::findOrFail($id);
    //     $koperasi->delete();

    //     if ($koperasi) {
    //         return redirect('admin-dashboard')
    //             ->with([
    //                 'success' => 'Post has been deleted successfully'
    //             ]);
    //     } else {
    //         return redirect('admin-dashboard')
    //             ->with([
    //                 'error' => 'Some problem has occurred, please try again'
    //             ]);
    //     }
    // }   
}