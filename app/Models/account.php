<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function transaction(){

        return $this->belongsTo('App\Models\transaction');
    }

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'char';
}
