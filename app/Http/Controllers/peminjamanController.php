<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = DB::table('peminjaman')
            ->get();
        // dd($koperasi[1]->id);
        // dd($koperasi);
        return view(
            'admin.peminjaman.index',
            [
                'peminjaman' => $peminjaman
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
        $rekening_id = DB::table('rekening')
            ->get();
        return view('admin.peminjaman.create', ['rekening' => $rekening_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rekening = DB::table('rekening')
            ->where('id', '=', $request->rekening_id)
            ->get();


        $now = Carbon::now();

        // dd($rekening);

        $peminjaman = DB::table('peminjaman')->insert([
            'rekening_id' => $rekening[0]->id,
            'jml_pinjam' => $request->jml_pinjam,
            'debet' => $request->debet,
            'kredit' => $request->kredit,
            'created_at' => $now,
            'updated_at' => '',
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username

        ]);
        // dd($nasabah);
        if ($peminjaman) {
            return redirect('admin-dashboard/peminjaman')
                ->with([
                    'success' => 'Nasabah has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/peminjaman')
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
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = peminjaman::findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjaman'));
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
        $peminjaman = peminjaman::findOrFail($id);

        $now = Carbon::now();

        // dd($rekening);
        $peminjaman->update([
            'rekening_id' => $request->rekening_id,
            'no_rekening' => $request->no_rekening,
            'jml_pinjam' => $request->jml_pinjam,
            'debet' => $request->debet,
            'kredit' => $request->kredit,
            'created_at' => '',
            'updated_at' => $now,
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username

        ]);

        if ($peminjaman) {
            return redirect('admin-dashboard/peminjaman')
                ->with([
                    'success' => 'Peminjaman has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/peminjaman')
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
    public function delete(Request $request, $id)
    {
        $peminjaman = DB::table('peminjaman')
            ->where('id', '=', $request->id)
            ->delete();

        if ($peminjaman) {
            return redirect('admin-dashboard/peminjaman')
                ->with([
                    'success' => 'Peminjaman has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/peminjaman')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
