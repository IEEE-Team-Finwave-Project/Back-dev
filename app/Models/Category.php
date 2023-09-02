<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function statistic(){
        return $this->hasOne(Statistic::class);
    }
}
