<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauSuaChua extends Model
{

    protected $table = 'YeuCauSuaChua';
    protected $fillable = [
        'ID_DichVu',
        'ID_Khach',
        'ID_Tho',
        'MoTa',
    ];


    public function khach()
    {
        return $this->hasOne('App\Models\NguoiDung', 'id', 'ID_Khach');
    }

    public function dichvu()
    {
        return $this->hasOne('App\Models\DichVu', 'id', 'ID_DichVu');
    }


}
