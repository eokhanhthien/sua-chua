<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class NguoiDung extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'NguoiDung';
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'HoTen',
        'SDT',
        'GioiTinh',
        'CCCD',
        'DiaChi',
        'Avatar',
        'TrangThai',
        'ID_Nhom',
    ];

    // Phương thức trả về tên trường chứa ID của người dùng
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    // Phương thức trả về ID của người dùng
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    // Phương thức trả về password của người dùng
    public function getAuthPassword()
    {
        return $this->password;
    }

    // (Optional) Phương thức kiểm tra xem một mật khẩu đã được mã hóa theo cách nào
    public function getAuthPasswordMethod()
    {
        return 'password';
    }

    // (Optional) Phương thức kiểm tra xem người dùng có được xác minh không
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    // (Optional) Phương thức set giá trị cho token ghi nhớ
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    // (Optional) Phương thức trả về tên của cột lưu trữ token ghi nhớ
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function mssv()
    {
        return $this->hasOne(Background::class, 'union_member_id', 'id');
    }

    public  function background()
    {
        return $this->hasOne(Background::class, 'union_member_id', 'id');
    }

    public function group()
    {
        return $this->hasOne(NhomNguoiDung::class, 'id', 'ID_Nhom');
    }

}
