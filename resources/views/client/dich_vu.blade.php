@extends('layouts.client')
@section('content')
<section class="service_section layout_padding"
style="background-color: rgb(250, 250, 250);"
>
    <div class="container ">
      <div class="heading_container heading_center">
        <h2> Nhóm dịch vụ </h2>
      </div>
      <div class="row">

        @foreach($nhom_dich_vu as $item)
            <div class="col-sm-6 col-md-3 mx-auto">
        <a href="{{route('client.chi_tiet_dich_vu', ['id' => $item->id])}}">

            <div class="box ">
                <div class="img-box">
                <img src="images/s1.png" alt="" />
                </div>
                <div class="detail-box">
                <h5>
                    {{$item->Ten}}
                </h5>
                <p>
                    {{$item->MoTa}}
                </p>
                </div>
            </div>
        </a>

            </div>
        @endforeach

 
      </div>
      <div class="btn-box">
        <a href="">
          View More
        </a>
      </div>
    </div>
  </section>
@endsection