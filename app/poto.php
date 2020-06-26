<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poto extends Model
{
    protected $table = 'poto';
    protected $fillable = ['tanggal', 'id_pos', 'judul', 'keterangan'];
}
