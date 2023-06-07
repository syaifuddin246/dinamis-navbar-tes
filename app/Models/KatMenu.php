<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatMenu extends Model
{
    use HasFactory;
    protected $table="katmenu";
    protected $fillable=['id','menunav','slug','created_at'];

    public function submenu(){
        return $this->hasMany(SubMenu::class);
    }
}
