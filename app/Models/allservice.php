<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\service;

class allservice extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function services(){
    return $this->belongsTo(service::class,'services_id');
    }
}
