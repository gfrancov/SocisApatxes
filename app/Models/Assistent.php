<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistent extends Model
{
    use HasFactory;

    protected $fillable = [
        'esdeveniment',
        'soci',
        'estatus'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function esdeveniment() {
        return $this->belongsTo(Esdeveniment::class);
    }
}
