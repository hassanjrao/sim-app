<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function addedBy(){
        return $this->belongsTo(User::class, 'added_by');
    }
}
