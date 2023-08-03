<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id_kelas'];

    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';
}
