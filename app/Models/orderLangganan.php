<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderLangganan extends Model
{
    protected $table = 'order_langganan';
    protected $fillable = ['user_id', 'nama_koperasi', 'alamat', 'npwp', 'nama_pimpinan', 'nama_bendahara', 'no_telp', 'email','status_approval','id_koperasi', 'created_at', 'edited_at' ];
    use HasFactory;
}
