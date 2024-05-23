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
        <h1 class="h3 mb-0 text-gray-800">Người dùng</h1>
        <a href="{{route('admin.member.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus" aria-hidden="true"></i>
            Tạo mới</a>
    </div>

    <!-- Content Row -->
    <div class="row card p-2 custom">
        <div class="col-12">
        <table class="table table-striped table-dark" id="data-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Nhóm</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
              <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$member->HoTen}}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->SDT }}</td>
                <td>{{ $member->group?->Ten }}</td>
                <td>
                    @if($member->TrangThai == 1)
                    <a style="text-decoration: none" href="{{route('admin.member.status', ['id' => $member->id ])}}">
                        <button class="btn btn-success" style="border-radius: 50px">
                            hoạt động
                        </button>
                    </a>
                    @else
                    <a style="text-decoration: none" href="{{route('admin.member.status', ['id' => $member->id ])}}">
                        <button class="btn btn-danger" style="border-radius: 50px">
                            Không hoạt động
                        </button>
                    </a>
                    @endif
                </td>
                {{-- <td>{{ $member->background->classes->name }}</td> --}}
                <td>
                    @if(!in_array($member->ID_Nhom, [1]))
                    <a style="text-decoration: none" href="{{route('admin.member.edit', ['id' => $member->id ])}}">
                        <button class="btn btn-info"><i class="fas fa-edit"></i></button>
                    </a>
                    <a style="text-decoration: none" href="{{route('admin.member.delete', ['id' => $member->id ])}}">
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