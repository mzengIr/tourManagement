<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    const TYPE_LAND_TOUR = 'land';
    const TYPE_AIR_TOUR = 'air';
    const TYPE_CYCLE_TOUR = 'cycle';

    protected $table = 'tours';

    protected $fillable = [
        'title',
        'description',
        'price',
        'days',
        'type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class , 'user_tour');
    }

    public function participants(){
        return $this->belongsToMany(User::class);
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id','admin_id');
    }
}
