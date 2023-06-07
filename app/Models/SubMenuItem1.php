<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuItem1 extends Model
{
    use HasFactory;
    protected $table="sub_menu_items1";
    protected $fillable=['id','nama','menu_item_id','submenu_item1_id','status','link'];

}
