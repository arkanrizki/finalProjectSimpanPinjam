<?php

namespace App\Http\Controllers;

use App\Models\profil_user;
use Illuminate\Http\Request;

class adminProfilUserController extends Controller
{
    public function index()
    {
        $profil_user = profil_user::all();
        return view('admin.profil-user.index', ['profil_user' => $profil_user]);
    }
}
