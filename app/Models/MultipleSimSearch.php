<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleSimSearch extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function systemSim(){
        return $this->belongsTo(SystemSim::class);
    }

    public function scannedBy(){
        return $this->belongsTo(User::class, "scanned_by");
    }
}
