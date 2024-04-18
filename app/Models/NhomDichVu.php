<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomDichVu extends Model
{

    protected $table = 'NhomDichVu';
    protected $fillable = [
        'Ten',
        'MoTa',
    ];


}
