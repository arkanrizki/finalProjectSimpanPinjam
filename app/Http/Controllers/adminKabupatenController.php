<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class adminKabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupaten = DB::table('regencies')->get();

        return view(
            'admin.kabupaten.index',
            [
                'kabupaten' => $kabupaten
            ]
        );
    }
}
