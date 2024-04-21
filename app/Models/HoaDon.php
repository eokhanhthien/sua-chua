<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{

    protected $table = 'HoaDon';
    protected $fillable = [
        'ID_YeuCauSuaChua',
        'ID_Tho',
        'TongTien',
        'TrangThaiThanhToan',
        'DanhGiaDichVu',
        'LyDoHuyDon',
    ];

}
