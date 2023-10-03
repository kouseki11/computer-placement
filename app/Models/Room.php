<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function computers()
    {
        return $this->hasMany(Computer::class);
    }
}
