<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class computer extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['room', 'brand'];
    protected $dates = [ 'deleted_at' ];

    public function scopeFilter($query, array $filters)
    {

         $query->when($filters['room'] ?? false, function($query, $room){
            return $query->whereHas('room', function($query) use ($room) {
                $query->where('slug', $room);
            });
         });

         $query->when($filters['brand'] ?? false, function($query, $brand){
            return $query->whereHas('brand', function($query) use ($brand) {
                $query->where('slug', $brand);
            });
         });

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
