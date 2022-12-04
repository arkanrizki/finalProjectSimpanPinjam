<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayatReorder extends Model
{
    use HasFactory;
    protected $table = 'riwayat_reorder';
    protected $fillable = ['koperasi_id', 'tgl_order', 'order_id', 'status_order', 'tgl_mulai_langganan', 'tgl_berakhir_langganan', 'created_by', 'edited_by' ];
}
