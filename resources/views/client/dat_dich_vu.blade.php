@extends('layouts.client')
@section('content')
<section class="service_section layout_padding"
style="background-color: rgb(250, 250, 250);"
>
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>Liên hệ đến thợ {{$dich_vu->Ten}} </h2>
      </div>

      {{-- tìm kiếm --}}
      <div class="row">
        <div class="col-md-4">
          <form action="" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo địa điểm" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row">

        @foreach($knsc as $item)
            <div class="col-sm-6 col-md-3 mx-auto">
        <a href="{{route('client.lienhe', ['id' => $item->id])}}">

            <div class="box ">
              <div class="height: 90px; width: 100px">
                @if($item->tho->Avatar)
                <img style="height: 90px; width: 100px; object-fit: cover; border-radius: 50% " src="{{ asset('uploads/' . $item?->tho->Avatar) }}" alt="" />
                @else
                <img style="height: 90px; width: 100px; object-fit: cover; border-radius: 50% " src="https://icons.veryicon.com/png/o/miscellaneous/standard/avatar-15.png" alt="" />
                @endif
              </div>
                <div class="detail-box">
                <h5>
                    {{$item->tho->HoTen}}
                </h5>
                <p>
                  {{number_format($item->GiaTho)}} đ
                </p>
                <p>
                  {{$item->tho->DiaChi}}
                </p>
                </div>
            </div>
        </a>

            </div>
        @endforeach

 
      </div>

      {{-- <section class="contact_section layout_padding">
        <div class="container">
          <div class="heading_container">
            <h2>
              Kết nối với chúng tôi
            </h2>
          </div>
          <div class="row">
            <div class="col-md-6">
              <form action="">
                <div>
                  <input type="text" placeholder="Name" />
                </div>
                <div>
                  <input type="text" placeholder="Phone Number" />
                </div>
                <div>
                  <input type="email" placeholder="Email" />
                </div>
                <div>
                  <input type="text" class="message-box" placeholder="Message" />
                </div>
                <div class="d-flex ">
                  <button>
                    Gửi
                  </button>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <div class="map_container">
                <div class="map">
                  <div id="googleMap" style="width:100%;height:100%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
     
    </div>
  </section>
@endsection