<?php

namespace App\Http\Controllers;

use App\Models\rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class rekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening = DB::table('rekening')
            ->get();
        // dd($koperasi[1]->id);
        // dd($koperasi);
        return view(
            'admin.rekening.index',
            [
                'rekening' => $rekening
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
        $nasabah_id = DB::table('nasabah')
            ->get();
        return view('admin.rekening.create', ['nasabah' => $nasabah_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd(Auth::user());
        // dd($request->nasabah_id);

        $rekening = DB::table('rekening')->insert([
            'nasabah_id' => $request->nasabah_id,
            'no_rekening' => $request->no_rekening,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username
        
        ]);

        if ($rekening) {
            return redirect('admin-dashboard/rekening')
                ->with([
                    'success' => 'Nasabah has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/rekening')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $rekening = rekening::findOrFail($id);

        return view('admin.rekening.edit', compact('rekening'));
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
        $rekening = rekening::findOrFail($id);

        // dd($rekening);
        $rekening->update([
            'nasabah_id' => $request->nasabah_id,
            'no_rekening' => $request->no_rekening,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'created_by' => Auth::user()->username,
            'updated_by' => Auth::user()->username
        
        ]);

        if ($rekening) {
            return redirect('admin-dashboard/rekening')
                ->with([
                    'success' => 'Rekening has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/rekening')
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
        // $rekening = rekening::findOrFail($id);
        // $rekening->delete();

        $rekening = DB::table('rekening')
            ->where('id', '=', $request->id)
            ->delete();

        if ($rekening) {
            return redirect('admin-dashboard/rekening')
                ->with([
                    'success' => 'Rekening has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/rekening')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}