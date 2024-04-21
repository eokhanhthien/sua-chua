<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [IndexController::class,'login'])->name('admin.login.index');
Route::post('/login', [IndexController::class,'postLogin'])->name('admin.login.post');
Route::get('/register', [IndexController::class,'register'])->name('admin.register.index');
Route::post('/register', [IndexController::class,'postRegister'])->name('admin.register.post');
Route::get('/logout', [IndexController::class,'logout'])->name('admin.logout');


// Quản trị viên
Route::get('/dashboard', [IndexController::class,'index'])->name('admin.dashboard.index');

// Quản nhóm dịch vụ
Route::get('/nhom-dich-vu', [IndexController::class,'NhomDV'])->name('admin.NhomDV.index');
Route::get('/create-nhom-dich-vu', [IndexController::class,'createNhomDV'])->name('admin.NhomDV.create');
Route::post('/store-nhom-dich-vu', [IndexController::class,'storeNhomDV'])->name('admin.NhomDV.store');
Route::get('/edit-nhom-dich-vu/{id}', [IndexController::class,'editNhomDV'])->name('admin.NhomDV.edit');
Route::post('/update-nhom-dich-vu/{id}', [IndexController::class,'updateNhomDV'])->name('admin.NhomDV.update');
Route::get('/delete-nhom-dich-vu/{id}', [IndexController::class,'deleteNhomDV'])->name('admin.NhomDV.delete');

// Quản lý dịch vụ
Route::get('/dich-vu', [IndexController::class,'Dichvu'])->name('admin.dichvu.index');
Route::get('/create-dich-vu', [IndexController::class,'createDichvu'])->name('admin.dichvu.create');
Route::post('/store-dich-vu', [IndexController::class,'storeDichvu'])->name('admin.dichvu.store');
Route::get('/edit-dich-vu/{id}', [IndexController::class,'editDichvu'])->name('admin.dichvu.edit');
Route::post('/update-dich-vu/{id}', [IndexController::class,'updateDichvu'])->name('admin.dichvu.update');
Route::get('/delete-dich-vu/{id}', [IndexController::class,'deleteDichvu'])->name('admin.dichvu.delete');

// Quản lý người dùng
Route::get('/member', [IndexController::class,'member'])->name('admin.member.index');
Route::get('/create-member', [IndexController::class,'createMember'])->name('admin.member.create');
Route::post('/store-member', [IndexController::class,'storeMember'])->name('admin.member.store');
Route::get('/edit-member/{id}', [IndexController::class,'editMember'])->name('admin.member.edit');
Route::post('/update-member/{id}', [IndexController::class,'updateMember'])->name('admin.member.update');
Route::get('/delete-member/{id}', [IndexController::class,'deleteMember'])->name('admin.member.delete');

// Quản lý nhóm người dùng
Route::get('/NhomNguoiDung', [IndexController::class,'NhomNguoiDung'])->name('admin.NhomNguoiDung.index');
Route::get('/create-NhomNguoiDung', [IndexController::class,'createNhomNguoiDung'])->name('admin.NhomNguoiDung.create');
Route::post('/store-NhomNguoiDung', [IndexController::class,'storeNhomNguoiDung'])->name('admin.NhomNguoiDung.store');
Route::get('/edit-NhomNguoiDung/{id}', [IndexController::class,'editNhomNguoiDung'])->name('admin.NhomNguoiDung.edit');
Route::post('/update-NhomNguoiDung/{id}', [IndexController::class,'updateNhomNguoiDung'])->name('admin.NhomNguoiDung.update');
Route::get('/delete-NhomNguoiDung/{id}', [IndexController::class,'deleteNhomNguoiDung'])->name('admin.NhomNguoiDung.delete');





// Thợ sửa
Route::get('/tho-sua/knsc', [IndexController::class,'technicalDichVu'])->name('technical.dich_vu');
Route::get('/tho-sua/tao-knsc', [IndexController::class,'technicalTaoKNSC'])->name('technical.taoknsc');
Route::post('/tho-sua/store-knsc', [IndexController::class,'technicalstoreKNSC'])->name('technical.storeknsc');
Route::get('/tho-sua/sua-knsc/{id}', [IndexController::class,'technicalSuaKNSC'])->name('technical.suaknsc');
Route::post('/tho-sua/update-knsc/{id}', [IndexController::class,'technicalupdateKNSC'])->name('technical.updateknsc');
Route::get('/tho-sua/delete-knsc/{id}', [IndexController::class,'technicaldeleteKNSC'])->name('technical.deleteknsc');


Route::get('/tho-sua/yeu-cau-sua-chua', [IndexController::class,'technicalYeuCauSuaChua'])->name('technical.yeu_cau_sua_chua');
Route::get('/tho-sua/hoa-don/{id}', [IndexController::class,'technicalHoaDon'])->name('technical.hoa_don');
Route::post('/tho-sua/check-hoa-don', [IndexController::class,'technicalCheckHoaDon'])->name('technical.check_hoa_don');


// Khách hàng

Route::get('/', [IndexController::class,'home'])->name('client.home');
Route::get('/client/dang-nhap', [IndexController::class,'clientLogin'])->name('client.login');
Route::post('/client/login', [IndexController::class,'clientPostLogin'])->name('client.login.post');
Route::post('/client/register', [IndexController::class,'clientPostregister'])->name('client.register.post');
Route::get('/client/dang-xuat', [IndexController::class,'clientLogout'])->name('client.logout');

Route::get('/client/dich-vu', [IndexController::class,'dich_vu'])->name('client.dich_vu');
Route::get('/client/dich-vu/{id}', [IndexController::class,'chi_tiet_dich_vu'])->name('client.chi_tiet_dich_vu');
Route::get('/client/dat-dich-vu/{id}', [IndexController::class,'dat_dich_vu'])->name('client.dat_dich_vu');
Route::get('/client/lienhe/{id}', [IndexController::class,'lienHeTho'])->name('client.lienhe');

Route::post('/client/yeucau', [IndexController::class,'yeuCauSua'])->name('client.yeucau');
Route::get('/client/profile', [IndexController::class,'profileClient'])->name('client.profile');
Route::post('/client/profile', [IndexController::class,'updateprofileClient'])->name('client.profile');
Route::get('/client/ycsc', [IndexController::class,'yeuCauClient'])->name('client.yeucau');
Route::get('/khach/hoa-don/{id}', [IndexController::class,'clientHoaDon'])->name('client.hoa_don');
