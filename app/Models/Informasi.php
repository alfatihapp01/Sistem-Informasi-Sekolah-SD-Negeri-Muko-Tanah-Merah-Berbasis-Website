<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Informasi extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id_informasi'];

    protected $table = 'informasi';

    protected $primaryKey = 'id_informasi';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
    
}
