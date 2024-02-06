<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;
    protected $fillable=['business_id','name','description','price'];
    public function business()
    {
        return $this->belongsTo(business::class);
    }
   
   
}
