<?php

namespace App\Http\Controllers;

use App\Models\riwayatReorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\callback;

function payment()
{
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-aKHeiC2d1LrBU3PHtuEeTqET';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    // $id = DB::table('riwayat_reorder')
    //     ->pluck('order_id');

    $koperasi = DB::table('order_langganan')
        ->where('status_approval', '=', 'Diterima')
        ->get();
    // dd($koperasi);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/1/status",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "\n\n",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: U0ItTWlkLXNlcnZlci1hS0hlaUMyZDFMckJVM1BIdHVFZVRxRVQ="
        ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    // dd($response);

    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => 50000,
        ),
        'customer_details' => array(
            'first_name' => $koperasi[0]->nama_koperasi,
            'last_name' => '',
            'email' => $koperasi[0]->email,
            'phone' => $koperasi[0]->no_telp,
            'billing_address' => array(
                'first_name' => $koperasi[0]->nama_bendahara,
                'last_name' => '',
                'email' => $koperasi[0]->email,
                'phone' => $koperasi[0]->no_telp,
                'address' => $koperasi[0]->alamat,
                'city' => '',
                'postal_code' => '12190',
                'country_code' => 'IDN'
            ),
        ),
        'callbacks' => array(
            'finish' => 'http://localhost:8000/admin-dashboard/riwayat-reorder/create',
        ),
    );
    // dd($params);
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    // dd($snapToken);
    return $snapToken;
}

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
        // dd($order);

        return view('admin.riwayatReorder.create', [
            'order_id' => $order,
            'snap_token' => payment(),
        ]);
    }

    public function store(Request $request)
    {
        $temp1 = DB::table('order_langganan')
            ->where('id', '=', $request->order_id)
            ->select('id')
            ->first()->id;
        $order = intval($temp1);
        $nama = DB::table('order_langganan')
            ->pluck('nama_koperasi');
        $temp2 = DB::table('koperasi')
            ->where('nama', '=', $nama)
            ->select('id')
            ->first()->id;
        $id = intval($temp2);
        $tgl = DB::table('order_langganan')
            ->select('created_at')
            ->first()->created_at;
        $now = Carbon::now();
        $next_month = Carbon::now()->addMonth(1);

        // dd($order);
        // dd(Auth::user());
        $riwayat = DB::table('riwayat_reorder')->insert([
            'koperasi_id' => $id,
            'tgl_order' => $tgl,
            'order_id' => $order,
            'status_order' => $request->status_order,
            'tgl_mulai_langganan' => $now,
            'tgl_berakhir_langganan' => $next_month,
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
