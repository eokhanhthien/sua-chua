@extends('layouts.admin')
@section('content')

<div class="p-5">
    <a href="{{route('admin.NhomDV.index')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Thêm mới Nhóm dịch vụ</h5>
<form action="{{route('admin.NhomDV.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên nhóm dịch vụ</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Tạo mới</button>
</form>

</div>

@endsection