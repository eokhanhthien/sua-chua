@extends('layouts.admin')
@section('content')

<div class="p-5">
    <a href="{{route('admin.member.index')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Thêm mới đoàn viên</h5>

<form action="{{route('admin.member.store')}}" method="POST" class="card p-2" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="image">Ảnh đại diện</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Họ và tên</label>
            <input type="text" name="full_name" id="name" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="gender">Giới tính</label>
            <select id="gender" name="gender" class="form-control">
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="cccd">CCCD</label>
            <input type="text" name="cccd" id="cccd" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="phone_number">Số điện thoại</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>



        <div class="form-group col-md-6">
            <label for="description">Nhóm người dùng</label>
            <select name="user_group" id="user_group" class="form-control" required>
                <option value="">Chọn nhóm người dùng</option>
                @foreach ($NhomNguoiDung as $item)
                    <option value="{{$item->id}}">{{$item->Ten}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="address">Quê quán</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        
    </div>
    <button type="submit" class="btn btn-success">Tạo mới</button>
</form>

</div>

@endsection