@extends('layouts.client')
@section('content')
<section class="service_section layout_padding"
style="background-color: rgb(250, 250, 250);"
>
    <div class="container ">
 
      @if (Auth::guard('user')->check() && Auth::guard('user')->user()->ID_Nhom == 3)

        <section class="contact_section ">
        <div class="container">
          <div class="heading_container">
            <h2>
              Kết nối với thợ {{$knsc->tho->HoTen}}
            </h2>
          </div>
          @if(session('success'))
                <p class="text-success">Yêu cầu thành công</p>
            @endif
        
            @if(session('error'))
                <p class="text-danger">{!! html_entity_decode(session('error')) !!}</p>
            @endif
          <div class="row mb-5">
            <div class="col-md-6">
              <form action="{{route('client.yeucau')}}" method="post">
                @csrf
                <div>
                  <input name="name" type="text" placeholder="Tên của bạn" value="{{Auth::guard('user')->user()->HoTen}}" required/>
                </div>
                <div>
                  <input name="phone" type="text" placeholder="Số điện thoại của bạn" value="{{Auth::guard('user')->user()->SDT}}" required/>
                </div>
                <div>
                  <input name="email" type="email" placeholder="Email" value="{{Auth::guard('user')->user()->email}}" required/>
                </div>
                <div>
                  <input name="description" type="text" class="message-box" placeholder="Mô tả yêu cầu" required/>
                  <input name="ID_DichVu" value="{{$knsc->id}}" type="hidden" class="message-box" placeholder="Mô tả yêu cầu"/>
                  <input name="ID_Tho" value="{{$knsc->tho->id}}" type="hidden" class="message-box" placeholder="Mô tả yêu cầu"/>
                  <input name="ID_Khach" value="{{Auth::guard('user')->user()->id}}" type="hidden" class="message-box" placeholder="Mô tả yêu cầu"/>
                </div>
                <div class="d-flex ">
                  <button type="submit">
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
      </section>
    {{-- Hiện thông tin thợ --}}

     {!! $knsc->MoTa !!}
    </div>
  </section>
    @else
    <div class="mt-5 mb-5">
        <h5>Vui lòng đăng nhập trước khi đặt thợ  <a href="{{route('client.login')}}"><button class="btn btn-primary">Đăng nhập ngay</button></a></h5>
    </div>
    @endif
@endsection