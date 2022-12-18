<?php

namespace App\Http\Controllers;

use App\Models\orderLangganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class orderLanggananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = DB::table('order_langganan')
            ->get();
        // dd($koperasi[1]->id);
        // dd($koperasi);
        return view(
            'admin.orderLangganan.index',
            [
                'order' => $order
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
        $nama_koperasi = DB::table('koperasi')
            ->get();

        return view('admin.orderLangganan.create', [
            'nama_koperasi' => $nama_koperasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $koperasi = DB::table('koperasi')
            ->where('nama', '=', $request->nama_koperasi)
            ->get();
        $now = Carbon::now();
        // dd($koperasi[0]);
        // dd(Auth::user());
        $order = DB::table('order_langganan')->insert([
            'nama_koperasi' => $koperasi[0]->nama,
            'user_id' => Auth::user()->id,
            'alamat' => $koperasi[0]->alamat,
            'npwp' => $koperasi[0]->npwp,
            'nama_pimpinan' => $koperasi[0]->nama_pimpinan,
            'nama_bendahara' => $koperasi[0]->nama_bendahara,
            'no_telp' => $koperasi[0]->no_telp,
            'email' => $koperasi[0]->email,
            'status_approval' => $request->status_approval,
            'created_at' => $now,
        ]);

        if ($order) {
            return redirect('admin-dashboard/order-langganan')
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/order-langganan')
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
        $order = orderLangganan::findOrFail($id);
        // dd($order);
        return view('admin.orderLangganan.edit', compact('order'));
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
        $order = orderLangganan::findOrFail($id);

        // dd($order);
        $order = $order->update([
            'nama_koperasi' => $order->nama_koperasi,
            'user_id' => Auth::user()->id,
            'alamat' => $order->alamat,
            'npwp' => $order->npwp,
            'nama_pimpinan' => $order->nama_pimpinan,
            'nama_bendahara' => $order->nama_bendahara,
            'no_telp' => $order->no_telp,
            'email' => $order->email,
            'status_approval' => $request->status_approval,
            'updated_at' => now(),
        ]);
        // dd($order);
        if ($order) {
            return redirect('admin-dashboard/order-langganan')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect('admin-dashboard/order-langganan')
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
        $order = orderLangganan::findOrFail($id);
        $order->delete();

        if ($order) {
            return redirect('admin-dashboard/order-langganan')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect('admin-dashboard/order-langganan')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
