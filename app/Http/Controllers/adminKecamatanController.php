<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class adminKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = DB::table('districts')->get();

        return view(
            'admin.kecamatan.index',
            [
                'kecamatan' => $kecamatan
            ]
        );
    }
}
