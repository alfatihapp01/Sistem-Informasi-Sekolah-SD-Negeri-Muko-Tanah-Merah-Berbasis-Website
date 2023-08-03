<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'informasi_kegiatan';

    protected $primaryKey = 'id';
}
