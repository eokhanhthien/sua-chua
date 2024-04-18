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
    <a href="{{route('technical.dich_vu')}}">
        <button class="btn btn-primary mb-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button>
    </a>

<h5>Thêm mới dịch vụ</h5>
<form action="{{route('technical.storeknsc')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="description">Dịch vụ</label>
        <select name="service" id="service" class="form-control" required>
            <option value="">Chọn dịch vụ</option>
            @foreach ($dich_vu as $item)
                <option value="{{$item->id}}">{{$item->Ten}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>


    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
    </div>

    <button onclick="handleSubmit()" type="button" class="btn btn-success">Tạo mới</button>
</form>

</div>


<script>
    new SlimSelect({
      select: '#service'
    })
  </script>
  <script>
    CKEDITOR.replace('description', {
            extraPlugins: 'colorbutton,colordialog,font,justify,colorbutton',
            toolbar: [
                { name: 'document', items: ['Source'] },
                { name: 'clipboard', items: ['Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
                { name: 'tools', items: ['Maximize'] },
                '/',
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'justify', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] }
            ],
            colorButton_colors: '0088CC,00CC99,FF0000',
            colorButton_enableMore: true,
            colorButton_foreStyle: {
                element: 'span',
                styles: { 'color': '#(color)' }
            }
    });

    function handleSubmit() {
        let service = $('#service').val();
        let price = $('#price').val();
        let description = CKEDITOR.instances.description.getData();
        if (service == '' || description == '' || price == '') {
            toastr.error('Vui lòng điền đầy đủ thông tin');
        } else {
            $('form').submit();
        }
    }
</script>
@endsection