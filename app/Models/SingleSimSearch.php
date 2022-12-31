<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleSimSearch extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function scannedBy(){
        return $this->belongsTo(User::class, "scanned_by");
    }

    public function systemSim(){
        return $this->belongsTo(SystemSim::class);
    }
}
