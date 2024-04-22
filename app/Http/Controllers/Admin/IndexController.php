<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NguoiDung;

use App\Models\NhomDichVu;
use App\Models\DichVu;
use App\Models\NhomNguoiDung;
use App\Models\KhaNangSuaChua;
use App\Models\YeuCauSuaChua;
use App\Models\HoaDon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        if (Auth::guard('user')->check()) {
            // Người dùng union_member đã đăng nhập, tiếp tục hiển thị trang dashboard của họ
            if (Auth::guard('user')->user()->ID_Nhom == 1) {
                $tho = NguoiDung::where('ID_Nhom', 2)->get();
                $khach = NguoiDung::where('ID_Nhom', 3)->get();
                $dichvu = DichVu::get();
                return view('admin.dashboard.index',compact('tho','khach','dichvu'));
            }elseif(Auth::guard('user')->user()->ID_Nhom == 2 && Auth::guard('user')->user()->TrangThai == 1){
                $don = YeuCauSuaChua::where('ID_Tho', Auth::guard('user')->user()->id)->get();
                return view('technical.dashboard.index',compact('don'));
            }else{
                Auth::guard('user')->logout();
                return redirect()->route('admin.login.index')->with('error', 'Tài khoản của bạn chưa được duyệt');
            }
            
        }
        // Nếu không phải union_member hoặc không đăng nhập, chuyển hướng đến trang đăng nhập admin
        return redirect()->route('admin.login.index');
    }
    public function login(){
        return view("admin.auth.login");
    }
    public function register(Request $request){
        return view("admin.auth.register");
    }
    public function postRegister(Request $request){
        $union_member = new NguoiDung();
        $union_member->HoTen = $request->full_name;
        $union_member->email = $request->email;
        $union_member->password = bcrypt($request->password);
        $union_member->ID_Nhom = 2;
        $union_member->TrangThai = 0;
        $union_member->save();
        return redirect()->back();
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {              
            if (Auth::guard('user')->attempt($credentials)) {
               // Kiểm tra xem đã đăng nhập chưa 
                if (Auth::guard('user')->check()) {
                    // Kiểm tra role
                    if (Auth::guard('user')) {
                        return redirect()->route('admin.dashboard.index');
                    } 
                }
                return redirect()->back()->with('error', 'Sai thông tin đăng nhập');
            }else{
                return redirect()->route('admin.login.index')->with('error', 'Tài khoản của bạn chưa được duyệt');
            }
            } catch (ValidationException $e) {
            return redirect()->back()->withErrors(['message' => 'Email hoặc mật khẩu không chính xác'])->withInput();
        }
    }
    public function logout(){
        Auth::guard('user')->logout();
        return redirect()->route('admin.login.index');
    }

    // START Quản lý nhóm dịch vụ ========================================================================================================
    public function NhomDV(){
        $datas = NhomDichVu::all();
        return view('admin.nhom_dich_vu.index', compact('datas'));

    }

    public function createNhomDV(Request $request){
        return view('admin.nhom_dich_vu.add');
    }

    public function storeNhomDV(Request $request){
        $nhomDV = new NhomDichVu();
        $nhomDV->Ten = $request->name;
        $nhomDV->MoTa = $request->description;
        $nhomDV->save();
        return redirect('/nhom-dich-vu')->with('success', 'Thêm mới nhóm dịch vụ thành công');
    }

    public function editNhomDV($id){
        $data = NhomDichVu::find($id);
        return view('admin.nhom_dich_vu.edit',compact('data'));
    }

    public function updateNhomDV(Request $request, $id) {
        $nhomDV = NhomDichVu::find($id);
        $nhomDV->Ten = $request->name;
        $nhomDV->MoTa = $request->description;
        $nhomDV->save();
        return redirect('/nhom-dich-vu')->with('success', 'Cập nhật nhóm dịch vụ thành công');
    }

    public function deleteNhomDV($id){
        $nhomDV = NhomDichVu::find($id);
        $nhomDV->delete();
        return redirect('/nhom-dich-vu')->with('success', 'Xóa nhóm dịch vụ thành công');
    }
    // END Quản lý nhóm dịch vụ ========================================================================================================

      // START Quản lý dịch vụ ========================================================================================================
      public function DichVu(){
        $dich_vu = DichVu::all();

        return view('admin.dich_vu.index', compact('dich_vu'));

    }

    public function createDichVu(Request $request){
        $nhomDV = NhomDichVu::all();
        return view('admin.dich_vu.add',compact('nhomDV'));
    }

    public function storeDichVu(Request $request){
        $dich_vu = new DichVu();
        $dich_vu->Ten = $request->name;
        $dich_vu->ID_Nhom = $request->department_id;
        $dich_vu->Mota = "";
  
        $get_image = $request->image;
        $path = 'uploads/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $dich_vu->Anh = $new_image;
        $dich_vu->save();
        return redirect('/dich-vu')->with('success', 'Thêm mới dịch vụ thành công');
    }

    public function editDichVu($id){
        $DichVu = DichVu::find($id);
        $NhomDichVu = NhomDichVu::all();
        return view('admin.dich_vu.edit',compact('DichVu','NhomDichVu'));
    }

    public function updateDichVu(Request $request, $id) {
        $dich_vu = DichVu::find($id);
        $dich_vu->Ten = $request->name;
        $dich_vu->ID_Nhom = $request->department_id;
        $dich_vu->Mota = "";
        $get_image = $request->image;

        if($get_image){
            // Bỏ hình ảnh cũ
            if($dich_vu->image){
                $path_unlink = 'uploads/'.$dich_vu->image;
                if(file_exists($path_unlink)){
                    unlink($path_unlink);
                }
            }
            // Thêm mới
            $path = 'uploads/';
            $get_name_image = $get_image-> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $dich_vu->Anh = $new_image;
        }

        $dich_vu->save();
        return redirect('/dich-vu')->with('success', 'Cập nhật dịch vụ thành công');
    }

    public function deleteDichVu($id){
        $classes = DichVu::find($id);
        if($classes->image){
            $path_unlink = 'uploads/'.$classes->image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
        }
        $classes->delete();
        return redirect('/dich-vu')->with('success', 'Xóa dịch vụ thành công');
    }
    // END Quản lý dịch vụ ========================================================================================================

    // START Quản lý đoàn viên ========================================================================================================
    public function member(){
        $members = NguoiDung::get();

        return view('admin.nguoi_dung.index', compact('members'));

    }

    public function createMember(Request $request){
        $NhomNguoiDung = NhomNguoiDung::all();
        return view('admin.nguoi_dung.add',compact('NhomNguoiDung'));
    }

    public function storeMember(Request $request){
        $NguoiDung = new NguoiDung();
        $NguoiDung->HoTen = $request->full_name;
        $NguoiDung->email = $request->email;
        $check_email = NguoiDung::where('email',$request->email)->first();
        if($check_email){
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }
        $NguoiDung->password = bcrypt($request->password);
        $NguoiDung->ID_Nhom = $request->user_group;
        $NguoiDung->CCCD = $request->cccd;
        $NguoiDung->GioiTinh = $request->gender;
        $NguoiDung->DiaChi = $request->address;
        $NguoiDung->SDT = $request->phone_number;
        $get_image = $request->image;
        $path = 'uploads/';
        $get_name_image = $get_image-> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $NguoiDung->Avatar = $new_image;
        $NguoiDung->TrangThai = 1;

        $NguoiDung->save();

        return redirect('/member')->with('success', 'Thêm mới người dùng thành công');
    }

    public function editMember($id){
        $NguoiDung = NguoiDung::find($id);
        $NhomNguoiDung = NhomNguoiDung::all();
        return view('admin.nguoi_dung.edit',compact('NguoiDung','NhomNguoiDung'));
    }

    public function statusMember($id){
        $NguoiDung = NguoiDung::find($id);
        $NguoiDung->TrangThai = !$NguoiDung->TrangThai;
        $NguoiDung->save();
        return redirect('/member')->with('success', 'Đổi trạng thái thành công');
    }

    public function updateMember(Request $request, $id) {
        $NguoiDung = NguoiDung::find($id);
        $NguoiDung->HoTen = $request->full_name;
        $NguoiDung->email = $request->email;
        if($request->password){
        $NguoiDung->password = bcrypt($request->password);
        }
        $NguoiDung->ID_Nhom = $request->user_group;
        $NguoiDung->CCCD = $request->cccd;
        $NguoiDung->GioiTinh = $request->gender;
        $NguoiDung->DiaChi = $request->address;
        $NguoiDung->SDT = $request->phone_number;
        $get_image = $request->image;

        if($get_image){
            // Bỏ hình ảnh cũ
            if($NguoiDung->image){
                $path_unlink = 'uploads/'.$NguoiDung->image;
                if(file_exists($path_unlink)){
                    unlink($path_unlink);
                }
            }
            // Thêm mới
            $path = 'uploads/';
            $get_name_image = $get_image-> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $NguoiDung->Avatar = $new_image;
        }
        $NguoiDung->save();


        return redirect('/member')->with('success', 'Cập nhật người dùng thành công');
    }

    public function deleteMember($id){
        $NguoiDung = NguoiDung::find($id);

        if($NguoiDung->image){
            $path_unlink = 'uploads/'.$NguoiDung->image;
            if(file_exists($path_unlink) && $NguoiDung->image){
                unlink($path_unlink);
            }
        }
        $NguoiDung->delete();
        return redirect('/member')->with('success', 'Xóa người dùng thành công');
    }
    // END Quản lý đoàn viên ========================================================================================================


      // START Quản lý chức vụ ========================================================================================================
      public function NhomNguoiDung(){
        $NhomNguoiDung = NhomNguoiDung::all();
        return view('admin.nhom_nguoi_dung.index', compact('NhomNguoiDung'));

    }

    public function createNhomNguoiDung(Request $request){
        return view('admin.nhom_nguoi_dung.add');
    }

    public function storeNhomNguoiDung(Request $request){
        $NhomNguoiDung = new NhomNguoiDung();
        $NhomNguoiDung->Ten = $request->name;
        $NhomNguoiDung->MoTa = $request->description;
        $NhomNguoiDung->save();
        return redirect('/NhomNguoiDung')->with('success', 'Thêm nhóm thành công');
    }

    public function editNhomNguoiDung($id){
        $NhomNguoiDung = NhomNguoiDung::find($id);
        return view('admin.nhom_nguoi_dung.edit',compact('NhomNguoiDung'));
    }

    public function updateNhomNguoiDung(Request $request, $id) {
        $NhomNguoiDung = NhomNguoiDung::find($id);
        $NhomNguoiDung->Ten = $request->name;
        $NhomNguoiDung->MoTa = $request->description;
        $NhomNguoiDung->save();
        return redirect('/NhomNguoiDung')->with('success', 'Cập nhật nhóm thành công');
    }

    public function deleteNhomNguoiDung($id){
        $NhomNguoiDung = NhomNguoiDung::find($id);
        $NhomNguoiDung->delete();
        return redirect('/NhomNguoiDung')->with('success', 'Xóa nhóm thành công');
    }
    // END Quản lý chức vụ ========================================================================================================


   

    // Thợ sửa
    public function technicalDichVu(){
        $knsc = KhaNangSuaChua::where('ID_Tho',Auth::guard('user')->user()->id)->get();
        return view('technical.knsc.index', compact('knsc'));
    }
    public function technicalTaoKNSC(){
        $dich_vu = DichVu::all();
        return view('technical.knsc.add', compact('dich_vu'));
    }

    public function technicalstoreKNSC( Request $request){
        $knsc = new KhaNangSuaChua();
        $knsc->ID_Tho = Auth::guard('user')->user()->id;
        $knsc->ID_DichVu = $request->service;
        $knsc->GiaTho = $request->price;
        $knsc->MoTa = $request->description;
        $knsc->DanhGia = "";
        $knsc->save();
        return redirect('/tho-sua/knsc')->with('success', 'Thêm knsc thành công');
    }

    public function technicalSuaKNSC( Request $request, $id){
        $dich_vu = DichVu::all();
        $knsc = KhaNangSuaChua::find($id);
        return view('technical.knsc.edit', compact('dich_vu','knsc'));
    }

    public function technicalupdateKNSC( Request $request, $id){
        $knsc = KhaNangSuaChua::find($id);
        $knsc->ID_Tho = Auth::guard('user')->user()->id;
        $knsc->ID_DichVu = $request->service;
        $knsc->GiaTho = $request->price;
        $knsc->MoTa = $request->description;
        $knsc->DanhGia = "";
        $knsc->save();
        return redirect('/tho-sua/knsc')->with('success', 'Sửa knsc thành công');
    }
    public function technicaldeleteKNSC($id)
    {
        $knsc = KhaNangSuaChua::find($id);
        $knsc->delete();
        return redirect('/tho-sua/knsc')->with('success', 'Xóa knsc thành công');
    }

    public function technicalYeuCauSuaChua()
    {
        $ycsc = YeuCauSuaChua::where('ID_Tho',Auth::guard('user')->user()->id)->get();
        return view('technical.ycsc.index', compact('ycsc'));
    }

    public function technicalHoaDon(Request $request, $id){ 
        $ycsc = YeuCauSuaChua::find($id);
        $hoadon= HoaDon::where('ID_YeuCauSuaChua',$id)->first();
        return view('technical.ycsc.view',compact('ycsc','hoadon'));
    }

    public function technicalCheckHoaDon(Request $request){
        $hoadon=HoaDon::find($request->id_hoa_don);
        $hoadon->TrangThaiThanhToan = $request->status;
        if(isset($request->note)){
            $hoadon->LyDoHuyDon = $request->note;
        }
        $hoadon->save();
        return redirect('/tho-sua/yeu-cau-sua-chua')->with('success', 'Cập nhật thành công');
    }

    // Khách hàng

    public function home(){
        return view('client.home');
    }

    public function dich_vu(){
        $nhom_dich_vu = NhomDichVu::all();
        return view('client.dich_vu',compact('nhom_dich_vu'));
    }


    public function chi_tiet_dich_vu($id){
        $nhom_dich_vu = NhomDichVu::find( $id );
        $dich_vu = DichVu::where('ID_Nhom',$id)->get();
        return view('client.chi_tiet_dich_vu',compact('dich_vu','nhom_dich_vu'));
    }

    public function dat_dich_vu($id){
        $dich_vu = DichVu::find( $id );
        $knsc = KhaNangSuaChua::where('ID_DichVu',$id)->get();
        return view('client.dat_dich_vu',compact('dich_vu','knsc'));
    }

    public function lienHeTho($id){
        $knsc = KhaNangSuaChua::find($id);
        return view('client.lien_he_tho',compact('knsc'));
    }

    public function clientLogin(){  
        return view('client.login');

    }

    public function clientPostLogin(Request $request)  {

        $credentials = $request->only('email', 'password');
        try {      
            if (Auth::guard('user')->attempt($credentials)) {
               // Kiểm tra xem đã đăng nhập chưa
                if (Auth::guard('user')->check()) {
                    // Kiểm tra role
                    if (Auth::guard('user')->user()->ID_Nhom == 3) {
                        return redirect('/')->with('success','Đăng nhập thành công');
                    } 
                }
            } else {
                return redirect()->back()->with('error', 'Sai thông tin đăng nhập');
            }
            } catch (ValidationException $e) {
            return redirect()->back()->withErrors(['message' => 'Email hoặc mật khẩu không chính xác'])->withInput();
        }
    }

    public function clientPostregister(Request $request){
        $union_member = new NguoiDung();
        $union_member->HoTen = $request->name;
        $union_member->email = $request->email;
        $union_member->password = bcrypt($request->password);
        $union_member->ID_Nhom = 3;
        $union_member->TrangThai = 1;
        $union_member->save();
        return redirect()->back()->with('success','Đăng ký thành công');
    }

    public function clientLogout(){
        Auth::guard('user')->logout();
        return redirect()->route('client.login');
    }

    public function yeuCauSua(Request $request){
        $khach = NguoiDung::find($request->ID_Khach);
        if($khach->SDT == ""){
            $khach->SDT = $request->phone;
            $khach->save();
        }

        if($khach->DiaChi == ""){
            $khach->DiaChi = $request->address;
            $khach->save();
        }

        $ycsc = new YeuCauSuaChua();
        $ycsc->ID_DichVu = $request->ID_DichVu;
        $ycsc->ID_Tho = $request->ID_Tho;
        $ycsc->ID_Khach = $request->ID_Khach;
        $ycsc->MoTa = $request->description;
        $ycsc->save();

        $knsc = KhaNangSuaChua::where('ID_DichVu', $request->ID_DichVu)->first();
        $hoadon = new HoaDon();
        $hoadon->ID_YeuCauSuaChua = $ycsc->id;
        $hoadon->ID_Tho = $request->ID_Tho;
        $hoadon->TongTien =   $knsc->GiaTho;
        $hoadon->TrangThaiThanhToan = 0;
        $hoadon->LyDoHuyDon = "";
        $hoadon->save();
        return redirect()->back()->with('success','Yêu cầu thành công thành công');
    }

    public function profileClient(){
        $NguoiDung = NguoiDung::find(Auth::guard('user')->user()->id);
        return view('client.profile',compact('NguoiDung'));
    }

    public function updateprofileClient(Request $request){
      $NguoiDung = NguoiDung::find(Auth::guard('user')->user()->id);
      $NguoiDung ->HoTen = $request->full_name;
      if($request->password){
        $NguoiDung->password = bcrypt($request->password);
        }
        $NguoiDung->GioiTinh = $request->gender;
        $NguoiDung->DiaChi = $request->address;
        $NguoiDung->SDT = $request->phone_number;
        $NguoiDung->save();
        return redirect()->back()->with('success','Cập nhật thông tin thành công');
    }


    public function yeuCauClient(){
        $ycsc = YeuCauSuaChua::where('ID_Khach',Auth::guard('user')->user()->id)->get();
        return view('client.ycsc',compact('ycsc'));
    }

    public function clientHoaDon(Request $request, $id){ 
        $ycsc = YeuCauSuaChua::find($id);
        $hoadon= HoaDon::where('ID_YeuCauSuaChua',$id)->first();
        return view('client.view',compact('ycsc','hoadon'));
    }

    public function danhGiaHoaDon(Request $request)
    {
        $hoadon=HoaDon::find($request->id_hoa_don);
        $hoadon->DanhGiaDichVu = $request->danhgia;
        $hoadon->save();
        return redirect()->back()->with('success','Cập nhật thông tin thành công');
    }
}
