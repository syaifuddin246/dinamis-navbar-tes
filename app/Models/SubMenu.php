<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $table='submenu';
    protected $fillable=['judul','gambar','id_katmenu','isi','slug','created_at'];

    // relasi post menu
    public function katmenu(){
        return $this->belongsTo(KatMenu::class,'id_katmenu');
    }

}
