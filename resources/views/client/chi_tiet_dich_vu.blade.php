@extends('layouts.client')
@section('content')
<section class="service_section layout_padding"
style="background-color: rgb(250, 250, 250);"
>
    <div class="container ">
      <div class="heading_container heading_center">
        <h2> {{$nhom_dich_vu->Ten}} </h2>
      </div>
      <div class="row">

        @foreach($dich_vu as $item)
        <div class="col-sm-6 col-md-3 mx-auto">
        <a href="{{route('client.dat_dich_vu', ['id' => $item->id])}}">

          <div class="box ">
            <div class="height: 130px; width: 230px">
              <img style="height: 130px; width: 230px; object-fit: cover" src="{{ asset('uploads/' . $item?->Anh) }}" alt="" />
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
        <a href="{{route('client.dich_vu')}}">
          Xem dịch vụ khác
        </a>
      </div>
    </div>
  </section>
@endsection