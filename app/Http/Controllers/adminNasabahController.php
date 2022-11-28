<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nasabah = DB::table('nasabah')
            ->get();
        // dd($nasabah[1]->id);
        // dd($nasabah);
        return view(
            'admin.nasabah.index',
            [
                'nasabah' => $nasabah
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
        return view('admin.nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nasabah = DB::table('nasabah')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,

        ]);
        if ($nasabah) {
            return redirect('admin-dashboard/nasabah')
                ->with([
                    'success' => 'Nasabah has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/nasabah')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nasabah = nasabah::findOrFail($id);
        return view('admin.nasabah.edit', compact('nasabah'));
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
        $nasabah = nasabah::findOrFail($id);
        $nasabah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);
        if ($nasabah) {
            return redirect('admin-dashboard/nasabah')
                ->with([
                    'success' => 'Nasabah has been updated successfully'
                ]);
        } else {
            return redirect('admin-dashboard/nasabah')
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
        $nasabah = nasabah::findOrFail($id);
        $nasabah->delete();

        if ($nasabah) {
            return redirect('admin-dashboard/nasabah')
                ->with([
                    'success' => 'Nasabah has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/nasabah')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
