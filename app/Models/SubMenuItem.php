<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuItem extends Model
{
    use HasFactory;
    protected $table = "sub_menu_items";
    protected $fillable = ['id','nama','link','status','menu_item_id'];

    public function submenuitem1(){
        return $this->hasMany(SubMenuItem1::class)->where('status','enable');
    }
}
