<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    protected $table = 'rekening';
    protected $fillable = ['id', 'nasabah_id', 'no_rekening', 'updated_at', 'created_at', 'updated_by', 'created_by'];
    use HasFactory;
}
