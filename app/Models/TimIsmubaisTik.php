<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimIsmubaisTik extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'tim_ismubaistik';

    protected $primaryKey = 'id';

    protected $with = ['jabatan'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
