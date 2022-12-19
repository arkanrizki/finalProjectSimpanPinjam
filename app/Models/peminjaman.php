<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = ['id', 'rekening_id', 'jml_pinjam', 'debet', 'kredit', 'created_at', 'updated_by', 'created_by'];
    use HasFactory;
}
