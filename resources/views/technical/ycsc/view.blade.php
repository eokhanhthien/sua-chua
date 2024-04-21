@extends('layouts.technical')
@section('content')
<script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
<link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet"></link>

@if(session('success'))
    <script>
        toastr.success('{!! html_entity_decode(session('success')) !!}');
    </script>
@endif

@if(session('error'))
    <script>
        toastr.error('{!! html_entity_decode(session('error')) !!}');
    </script>
@endif


<div class="p-5">
    <a href="{{route('technical.yeu_cau_sua_chua')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Hóa đơn</h5>
<form action="{{route('technical.check_hoa_don')}}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">
        <label for="customer">Tên khách hàng</label>
        <input type="text" name="customer" id="customer" class="form-control" value="{{$ycsc->khach->HoTen}}" disabled>
    </div>
    <div class="form-group">
        <label for="customer">Số điện thoại</label>
        <input type="text" name="customer" id="customer" class="form-control" value="{{$ycsc->khach->SDT}}" disabled>
    </div>
    <div class="form-group">
        <label for="service">Dịch vụ</label>
        <input type="text" name="service" id="service" class="form-control" value="{{$ycsc->dichvu->Ten}}" disabled>
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <input type="text" name="description" id="description" class="form-control" value="{{$ycsc->MoTa}}" disabled>
    </div>
    <div class="form-group">
        <label for="price">Tổng tiền</label>
        <input type="text" name="price" id="price" class="form-control" value="{{$hoadon->TongTien}}" disabled>
    </div>
    <div class="form-group">
        <label for="price">Trạng thái: 
            @if($hoadon->TrangThaiThanhToan == 0)
            <span class="text-success">Chưa thanh toán</span>
            @elseif($hoadon->TrangThaiThanhToan == 1)
            <span class="text-success">Đã thanh toán</span>

            @elseif($hoadon->TrangThaiThanhToan == 2)
            <span class="text-success">Đã hủy</span>

            @endif
            </label>
    </div>

    @if($hoadon->TrangThaiThanhToan == 0)
    <div class="row">
        <select class="form-control col-3" name="status" id="statusSelect" required>
            <option value="">Chọn trạng thái hóa đơn</option>
            <option value="1">Đã thanh toán</option>
            <option value="2">Đã hủy</option>
        </select>
        <input type="text" class="form-control col-3" id="reasonInput" style="display: none;" name="note" placeholder="Nhập lý do">
        <input type="hidden" name="id_hoa_don" value="{{$hoadon->id}}">
        <button type="submit" class="btn btn-success col-3" id="confirmButton">Xác nhận</button>
    </div>
    @endif

    @if($hoadon->TrangThaiThanhToan == 2)
        <p>Lý do hủy: {{$hoadon->LyDoHuyDon}}</p>
    @endif


</form>



</div>


<script>
    document.getElementById('statusSelect').addEventListener('change', function() {
        var reasonInput = document.getElementById('reasonInput');
        if (this.value === '2') { // Nếu chọn Đã hủy
            reasonInput.style.display = 'block'; // Hiển thị input nhập lý do
        } else {
            reasonInput.style.display = 'none'; // Ẩn input nhập lý do
        }
    });

    // Xử lý sự kiện khi nút xác nhận được nhấn
    document.getElementById('confirmButton').addEventListener('click', function() {
        var reasonInput = document.getElementById('reasonInput');
        var statusSelect = document.getElementById('statusSelect');
        if (statusSelect.value === '1') { // Nếu chọn Đã thanh toán
            reasonInput.value = ''; // Xóa nội dung trong input nhập lý do
        }
    });
</script>

@endsection