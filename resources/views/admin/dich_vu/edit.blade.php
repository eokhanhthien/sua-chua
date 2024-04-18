@extends('layouts.admin')
@section('content')


<div class="p-5">
    <a href="{{route('admin.dichvu.index')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>
<h5>Sửa dịch vụ</h5>
<form action="{{route('admin.dichvu.update', ['id' => $DichVu->id ])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Tên dịch vụ</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$DichVu->Ten}}" required>
    </div>
    <div class="form-group">
        <label for="image">Ảnh</label>
        <input type="file" name="image" id="image" class="form-control">

        <img src="{{ asset('uploads/' . $DichVu?->Anh) }}" alt="Ảnh đại diện" style="max-width: 100px;">
    </div>
    <div class="form-group">
        <label for="description">Nhóm dịch vụ</label>
        <select name="department_id" id="department_id" class="form-control" required>
            <option value="">Chọn nhóm dịch vụ</option>
            @foreach ($NhomDichVu as $item)
                <option value="{{$item->id}}" @if($DichVu->ID_Nhom == $item->id) selected @endif>{{$item->Ten}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>

</div>

@endsection