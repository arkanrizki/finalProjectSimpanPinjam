<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class koperasi extends Model
{
    protected $table = 'koperasi';
    protected $fillable = ['nama', 'alamat', 'npwp', 'nama_pimpinan', 'nama_bendahara', 'no_telp', 'email','id_koperasi', 'created_by', 'edited_by', 'id_user' ];
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
