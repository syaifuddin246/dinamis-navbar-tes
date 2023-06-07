<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $table = "menu_items";
    protected $fillable = ['id','nama','link','status'];

    public function submenuitem(){
        return $this->hasMany(SubMenuItem::class)->where('status','enable');
        // return $this->hasMany('App\submenuitem')->where('status','enable');
    }
    public function submenuitem1(){
        return $this->hasMany(SubMenuItem1::class)->where('status','enable');
    }
}


