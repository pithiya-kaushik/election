<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id','location_id','party_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class, 'id','user_id');
    }

    public function party()
    {
        return $this->hasMany(Party::class, 'id','party_id');
    }

    public function location()
    {
        return $this->hasMany(Location::class, 'id','location_id');
    }
}
