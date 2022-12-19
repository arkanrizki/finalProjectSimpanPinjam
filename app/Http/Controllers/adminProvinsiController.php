<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class adminProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = DB::table('provinces')->get();

        return view(
            'admin.provinsi.index',
            [
                'provinsi' => $provinsi
            ]
        );
    }
}
