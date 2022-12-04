<?php

namespace App\Http\Controllers;

use App\Models\riwayatReorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class riwayatReorderController extends Controller
{
    public function index()
    {
        $riwayat = DB::table('riwayat_reorder')
            ->get();
        // dd($koperasi[1]->id);
        // dd($koperasi);
        return view(
            'admin.riwayatReorder.index',
            [
                'riwayat' => $riwayat
            ]
        );
    }

    public function create()
    {
        $order = DB::table('order_langganan')
            ->get();

        return view('admin.riwayatReorder.create', [
            'order_id' => $order
        ]);
    }

    public function store(Request $request)
    {
        $order = DB::table('order_langganan')
            ->where('id', '=', $request->order_id)
            ->get();

        // dd($order);
        // dd(Auth::user());
        $riwayat = DB::table('riwayat_reorder')->insert([
            'koperasi_id' => $order[0]->koperasi_id,
            'tgl_order' => $request->tgl_order,
            'order_id' => $order[0]->order_id,
            'status_order' => $request->status_order,
            'tgl_mulai_langganan' => $request->tgl_mulai_langganan,
            'tgl_berakhir_langganan' => $request->tgl_berakhir_langganan,

        ]);

        if ($riwayat) {
            return redirect('admin-dashboard/riwayat-reorder')
                ->with([
                    'success' => 'Post has been added successfully'
                ]);
        } else {
            return redirect('admin-dashboard/riwayat-reorder')
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $order = riwayatReorder::findOrFail($id);
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
        $order = riwayatReorder::findOrFail($id);
        
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
            'status_approval' => $request->status_approval


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
        $order = riwayatReorder::findOrFail($id);
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
