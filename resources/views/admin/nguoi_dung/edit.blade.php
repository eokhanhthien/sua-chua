@extends('layouts.admin')
@section('content')

<div class="p-5">
    <a href="{{route('admin.member.index')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Sửa người dùng</h5>

<form action="{{route('admin.member.update',['id' => $NguoiDung->id ])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="image">Ảnh đại diện</label>
            <input type="file" name="image" id="image" class="form-control">

            <img src="{{ asset('uploads/' . $NguoiDung?->Avatar) }}" alt="Ảnh đại diện" style="max-width: 100px;">

        </div>

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
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control"  value="{{$NguoiDung->email}}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="password">Mật khẩu <span class="text-danger">Nếu không điền mật khẩu thì coi như không đổi</span></label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="cccd">CCCD</label>
            <input type="text" name="cccd" id="cccd" class="form-control"  value="{{$NguoiDung->CCCD}}" required>
        </div>

        <div class="form-group col-md-6">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"  value="{{$NguoiDung->SDT}}" required>
        </div>



        <div class="form-group col-md-6">
            <label for="description">Nhóm người dùng</label>
            <select name="user_group" id="user_group" class="form-control" required>
                <option value="">Chọn nhóm người dùng</option>
                @foreach ($NhomNguoiDung as $item)
                    <option {{ $NguoiDung->ID_Nhom == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->Ten}}</option>
                @endforeach
            </select>
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