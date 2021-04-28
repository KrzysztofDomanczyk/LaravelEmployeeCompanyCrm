<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstName', 'lastName', 'phone', 'email'];
    
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }
}
