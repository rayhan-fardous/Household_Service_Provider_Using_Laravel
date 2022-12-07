<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\allservice;

class service extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function allservices(){
    return $this->hasMany(allservice::class,'services_id');
    }
}
