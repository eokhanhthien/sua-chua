<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{

    protected $table = 'DichVu';
    protected $fillable = [
        'Ten',
        'ID_Nhom',
        'MoTa',
        'Anh',
    ];

    public function department(){
        return $this->hasOne(NhomDichVu::class,'id','ID_Nhom');
    }
}
