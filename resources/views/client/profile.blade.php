@extends('layouts.client')
@section('content')

<div class="p-5">

<h5>Thông tin cá nhân</h5>

<form action="{{route('client.profile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="form-group col-md-6">
            <label for="name">Họ và tên</label>
            <input type="text" name="full_name" id="name" class="form-control" value="{{$NguoiDung->HoTen}}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="gender">Giới tính</label>
            <select id="gender" name="gender" class="form-control">
                <option value="1" {{ $NguoiDung->GioiTinh == 1 ? 'selected' : '' }} value="1">Nam</option>
                <option value="0" {{ $NguoiDung->GioiTinh == 0 ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="password">Mật khẩu <span class="text-danger">Nếu không điền mật khẩu thì coi như không đổi</span></label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"  value="{{$NguoiDung->SDT}}" required>
        </div>



        <div class="form-group col-md-6">
            <label for="address">Quê quán</label>
            <input type="text" name="address" id="address" class="form-control" value="{{$NguoiDung->DiaChi}}" required>
        </div>

        
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>

</div>

@endsection