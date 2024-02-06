<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $fillable=['review','user_id','business_id','stars'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function business()
    { 
        return $this->belongsTo(business::class);
    }

}
