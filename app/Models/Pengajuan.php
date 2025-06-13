<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan'; // nama tabel
    protected $primaryKey = 'id_pengajuan'; // primary key
    protected $guarded = []; // atau gunakan $fillable sesuai kebutuhan
}
