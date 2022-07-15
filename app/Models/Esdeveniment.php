<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esdeveniment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ubicacio',
        'data'
    ];

    public function assistents() {
        return $this->hasMany(Assistent::class);
    }

}
