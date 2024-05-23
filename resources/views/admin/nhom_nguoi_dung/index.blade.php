@extends('layouts.admin')
@section('content')

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

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nhóm người dùng</h1>
        <a href="{{route('admin.NhomNguoiDung.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus" aria-hidden="true"></i>
            Tạo mới</a>
    </div>

    <!-- Content Row -->
    <div class="row card p-2 custom">
        <div class="col-12">
        <table class="table table-striped table-dark" id="data-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên nhóm người dùng</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($NhomNguoiDung as $item)
              <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$item->Ten}}</td>
                <td>{{$item->MoTa}}</td>
                <td>
                    @if(!in_array($item->id, [1, 2, 3]))
                    <a style="text-decoration: none" href="{{route('admin.NhomNguoiDung.edit', ['id' => $item->id ])}}">
                        <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                    </a>
                    <a style="text-decoration: none" href="{{route('admin.NhomNguoiDung.delete', ['id' => $item->id ])}}">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </a>
                    @else
                    <span class="text-primary">Mặc định</span>
                    @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <!-- Content Row -->

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready( function () {
        $('#data-table').DataTable({
        dom: 'Blfrtip',
        });
    } );
</script>
@endsection