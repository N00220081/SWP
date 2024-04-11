<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_pic',
        'name',
        'pressure',
        'temperature',
        'timer',
        
    ] ;

    public function usages() {
        return $this->hasMany(Usage::class);
    }
}