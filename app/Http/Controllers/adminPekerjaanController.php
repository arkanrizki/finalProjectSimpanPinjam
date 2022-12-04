<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\DB;

class adminPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = DB::table('pekerjaan')->get();

        return view(
            'admin.pekerjaan.index',
            [
                'pekerjaan' => $pekerjaan
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
        return view('admin.pekerjaan.create');
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
            'nama' => 'required|unique:pekerjaan,nama'
        ]);

        $pekerjaan = DB::table('pekerjaan')->insert([
            'nama' => $request->nama,
        ]);
        if ($pekerjaan) {
            return redirect('admin-dashboard/pekerjaan')->with([
                'success' => "Pekerjaan has been added successfully"
            ]);
        } else {
            return redirect('admin-dashboard/pekerjaan')
                ->back()->withInput()
                ->with([
                    'error' => "Some problem has occured, please try again"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);
        return view('admin.pekerjaan.edit', compact('pekerjaan'));
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
        $pekerjaan = pekerjaan::findOrFail($id);
        $pekerjaan->update([
            'nama' => $request->nama,
        ]);
        if ($pekerjaan) {
            return redirect('admin-dashboard/pekerjaan')
                ->with([
                    'success' => 'Pekerjaan has been updated successfully'
                ]);
        } else {
            return redirect('admin-dashboard/pekerjaan')
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
        $pekerjaan = pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        if ($pekerjaan) {
            return redirect('admin-dashboard/pekerjaan')
                ->with([
                    'success' => 'Pekerjaan has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/pekerjaan')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
