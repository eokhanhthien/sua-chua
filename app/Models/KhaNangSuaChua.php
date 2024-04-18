<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaNangSuaChua extends Model
{

    protected $table = 'KhaNangSuaChua';
    protected $fillable = [
        'ID_Tho',
        'ID_DichVu',
        'GiaTho',
        'MoTa',
        'DanhGia',
    ];

    public function dichvu()
    {
        return $this->hasOne('App\Models\DichVu', 'id', 'ID_DichVu');
    }

    public function tho()
    {
        return $this->hasOne('App\Models\NguoiDung', 'id', 'ID_Tho');
    }

}
