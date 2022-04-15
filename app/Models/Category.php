<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function posts(){
        //terhubung kemana tulis sesuai yg ada di 

        return $this->hasMany(Postt::class);
        //relasinya apa
    }
}
