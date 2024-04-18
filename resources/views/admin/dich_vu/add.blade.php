@extends('layouts.admin')
@section('content')

<div class="p-5">
    <a href="{{route('admin.dichvu.index')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Thêm mới dịch vụ</h5>
<form action="{{route('admin.dichvu.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="name">Tên dịch vụ</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Ảnh</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Nhóm dịch vụ</label>
        <select name="department_id" id="department_id" class="form-control" required>
            <option value="">Chọn nhóm dịch vụ</option>
            @foreach ($nhomDV as $item)
                <option value="{{$item->id}}">{{$item->Ten}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Tạo mới</button>
</form>

</div>

@endsection