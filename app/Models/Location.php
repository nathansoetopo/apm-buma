<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'locations_users','location_id','user_id')->withPivot('range','waktu_scan','status')->withTimestamps();
    }
}
