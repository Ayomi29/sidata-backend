<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['division'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
