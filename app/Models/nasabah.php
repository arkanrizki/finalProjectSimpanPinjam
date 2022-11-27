<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';
    protected $fillable = ['nama', 'alamat', 'no_telp', 'updated_at', 'created_at'];
    use HasFactory;

    public $timestamps = false;

    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class);
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class);
    }

    public function koperasi()
    {
        return $this->hasOne(Koperasi::class);
    }
}
