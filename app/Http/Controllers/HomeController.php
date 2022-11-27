<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin'])->only('tabel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_koperasi = DB::table('koperasi')
        ->join('users', 'koperasi.id', '=', 'users.id')
        ->where('users.id', Auth::user()->id)
        ->value('koperasi.id');
        return view('home', compact('id_koperasi'));
    }

    public function home(){
        return view('welcome');
    }

    public function tabel()
    {
        return view('index');
    }
}
    // public function jadwalrk(){
    //     $jadwalrksertifikasi = DB::table('jadwal as j')
    //                         ->join('ref_kegiatan as rk', 'j.id_kegiatan', '=', 'rk.id')
    //                         ->join('penawaran_sertifikasi as ps', 'j.id_penawaran_sertifikasi', '=', 'ps.id')
    //                         ->get();

    //     return view('jadwalrk', compact('jadwalrksertifikasi'));
    // }

    // public function syaratanda(){
    //     $idasesi = DB::table('asesi')
    //                 ->join('users', 'asesi.id_user', '=', 'users.id')
    //                 ->where('users.id', Auth::user()->id)
    //                 ->value('asesi.id');

    //     $idpendaftar = DB::table('pendaftar')
    //                 ->join('asesi', 'pendaftar.id_asesi', '=', 'asesi.id')
    //                 ->where('asesi.id', $idasesi)
    //                 ->value('pendaftar.id');

    //     $syaratanda = DB::table('pendaftar_syarat as psy')
    //                 ->join('syarat_sertifikasi as ss', 'psy.id_syarat_sertifikasi', '=', 'ss.id')
    //                 ->where('psy.id_pendaftar', $idpendaftar)
    //                 ->get();

    //     return view('syaratanda', compact('syaratanda'));
    // }

    // public function penawaran(){
    //     $penawaran = DB::table('ref_jenis_sertifikasi as rjs')
    //             ->join('penawaran_sertifikasi as ps', 'rjs.id', '=', 'ps.id_ref_jenis_sertifikasi')
    //             ->get();
    //     return view('penawaran', compact('penawaran'));
    // }

    // public function hasil(){
    //     $idasesi = DB::table('asesi')
    //                 ->join('users', 'asesi.id_user', '=', 'users.id')
    //                 ->where('users.id', Auth::user()->id)
    //                 ->value('asesi.id');

    //     $idpendaftar = DB::table('pendaftar')
    //                 ->join('asesi', 'pendaftar.id_asesi', '=', 'asesi.id')
    //                 ->where('asesi.id', $idasesi)
    //                 ->value('pendaftar.id');

    //     $hasil = DB::table('asesor_pendaftar as ap')
    //         ->join('asesor_jenis_sertifikasi as ajs', 'ap.id_asesor_jenis_sertifikasi', '=', 'ajs.id')
    //         ->join('ref_jenis_sertifikasi as rjs', 'ajs.id_ref_jenis_sertifikasi', '=', 'rjs.id')
    //         ->join('penawaran_sertifikasi as ps', 'rjs.id', '=', 'ps.id_ref_jenis_sertifikasi')
    //         ->where('ap.id_pendaftar', $idpendaftar)
    //         ->get();
        
    //     return view('hasil', compact('hasil'));
    // }

    // public function asesmen(){
    //     $idasesi = DB::table('asesi')
    //                 ->join('users', 'asesi.id_user', '=', 'users.id')
    //                 ->where('users.id', Auth::user()->id)
    //                 ->value('asesi.id');

    //     $idpendaftar = DB::table('pendaftar')
    //                 ->join('asesi', 'pendaftar.id_asesi', '=', 'asesi.id')
    //                 ->where('asesi.id', $idasesi)
    //                 ->value('pendaftar.id');
        
    //     $asesmen = DB::table('pendaftar_instrumen as pi')
    //         ->join('instrumen_asesmen_kompetensi as iak', 'pi.id_instrumen_asesmen', '=', 'iak.id')
    //         ->where('pi.id_pendaftar', $idpendaftar)
    //         ->get();
        
    //     return view('asesmen', compact('asesmen'));
    // }

    // public function syarat(){
    //     $syarat = DB::table('ref_jenis_sertifikasi as rjs')
    //         ->join('syarat_sertifikasi as ss', 'rjs.id', '=', 'ss.id_ref_jenis_sertifikasi')
    //         ->get();
        
    //     return view('syarat', compact('syarat'));
    // }