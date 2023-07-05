<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::get('/', function () {
    return redirect(route("hotel.homepage"));
});


Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\adminmidddleware'], function () {
    Route::get('dashbroad', ['as' => 'admin.dashbroad', 'uses' => 'App\Http\Controllers\usercontroller@getdashbroad']);
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('danhsach', ['as' => 'admin.loaitin.danhsach', 'uses' => 'App\Http\Controllers\loaitincontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.loaitin.getthem', 'uses' => 'App\Http\Controllers\loaitincontroller@getthem']);
        Route::post('them', ['as' => 'admin.loaitin.them', 'uses' => 'App\Http\Controllers\loaitincontroller@them']);
        Route::get('sua/{ma}', ['as' => 'admin.loaitin.getsua', 'uses' => 'App\Http\Controllers\loaitincontroller@getsua']);
        Route::post('sua', ['as' => 'admin.loaitin.sua', 'uses' => 'App\Http\Controllers\loaitincontroller@sua']);
        Route::get('xoa/{ma}', ['as' => 'admin.loaitin.xoa', 'uses' => 'App\Http\Controllers\loaitincontroller@xoa']);
    });
    Route::group(['prefix' => 'baiviet'], function () {
        Route::get('danhsach', ['as' => 'admin.baiviet.danhsach', 'uses' => 'App\Http\Controllers\baivietcontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.baiviet.getthem', 'uses' => 'App\Http\Controllers\baivietcontroller@getthem']);
        Route::post('them', ['as' => 'admin.baiviet.them', 'uses' => 'App\Http\Controllers\baivietcontroller@them']);
        Route::get('sua/{idbv}', ['as' => 'admin.baiviet.getsua', 'uses' => 'App\Http\Controllers\baivietcontroller@getsua']);
        Route::post('sua', ['as' => 'admin.baiviet.sua', 'uses' => 'App\Http\Controllers\baivietcontroller@sua']);
        Route::get('xoa/{idbv}', ['as' => 'admin.baiviet.xoa', 'uses' => 'App\Http\Controllers\baivietcontroller@xoa']);
        Route::get('xoacmt/{idcmt}/{idbv}', ['as' => 'admin.baiviet.xoacmt', 'uses' => 'App\Http\Controllers\baivietcontroller@xoacmt']);
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('xoalp/{idlp}', ['as' => 'admin.comment.xoalp', 'uses' => 'App\Http\Controllers\commentcontroller@xoalp']);
        Route::get('xoaimg/{idanh}', ['as' => 'admin.comment.xoaimg', 'uses' => 'App\Http\Controllers\commentcontroller@xoaimg']);
        Route::get('danhsach', ['as' => 'admin.comment.danhsach', 'uses' => 'App\Http\Controllers\commentcontroller@getdanhsach']);
    });
    Route::group(['prefix' => 'khuvuc'], function () {
        Route::get('danhsach', ['as' => 'admin.khuvuc.danhsach', 'uses' => 'App\Http\Controllers\khuvuccontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.khuvuc.getthem', 'uses' => 'App\Http\Controllers\khuvuccontroller@getthem']);
        Route::post('them', ['as' => 'admin.khuvuc.them', 'uses' => 'App\Http\Controllers\khuvuccontroller@them']);
        Route::get('sua/{idkv}', ['as' => 'admin.khuvuc.getsua', 'uses' => 'App\Http\Controllers\khuvuccontroller@getsua']);
        Route::post('sua', ['as' => 'admin.khuvuc.sua', 'uses' => 'App\Http\Controllers\khuvuccontroller@sua']);
        Route::get('xoa/{idkv}', ['as' => 'admin.khuvuc.xoa', 'uses' => 'App\Http\Controllers\khuvuccontroller@xoa']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', ['as' => 'admin.user.danhsach', 'uses' => 'App\Http\Controllers\usercontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.user.getthem', 'uses' => 'App\Http\Controllers\usercontroller@getthem']);
        Route::post('them', ['as' => 'admin.user.them', 'uses' => 'App\Http\Controllers\usercontroller@them']);
        Route::get('sua/{iduser}', ['as' => 'admin.user.getsua', 'uses' => 'App\Http\Controllers\usercontroller@getsua']);
        Route::post('sua', ['as' => 'admin.user.sua', 'uses' => 'App\Http\Controllers\usercontroller@sua']);
        Route::get('xoa/{iduser}', ['as' => 'admin.user.xoa', 'uses' => 'App\Http\Controllers\usercontroller@xoa']);
    });
    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('danhsach', ['as' => 'admin.khachhang.danhsach', 'uses' => 'App\Http\Controllers\khachhangcontroller@getdanhsach']);
    });
    Route::group(['prefix' => 'khachsan'], function () {
        Route::get('danhsach', ['as' => 'admin.khachsan.danhsach', 'uses' => 'App\Http\Controllers\khachsancontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.khachsan.getthem', 'uses' => 'App\Http\Controllers\khachsancontroller@getthem']);
        Route::post('them', ['as' => 'admin.khachsan.them', 'uses' => 'App\Http\Controllers\khachsancontroller@them']);
        Route::get('sua/{idKS}', ['as' => 'admin.khachsan.getsua', 'uses' => 'App\Http\Controllers\khachsancontroller@getsua']);
        Route::post('sua', ['as' => 'admin.khachsan.sua', 'uses' => 'App\Http\Controllers\khachsancontroller@sua']);
        Route::get('xoa/{idKS}', ['as' => 'admin.khachsan.xoa', 'uses' => 'App\Http\Controllers\khachsancontroller@xoa']);
    });
    Route::group(['prefix' => 'chinhsach'], function () {
        /*Route::get('danhsach',['as'=>'admin.chinhsach.danhsach','uses'=>'chinhsachcontroller@getdanhsach']);*/
        /*Route::get('them',['as'=>'admin.chinhsach.getthem','uses'=>'chinhsachcontroller@getthem']);
		Route::post('them',['as'=>'admin.chinhsach.them','uses'=>'chinhsachcontroller@them']);*/
        Route::get('sua/{idKS}', ['as' => 'admin.chinhsach.getsua', 'uses' => 'App\Http\Controllers\chinhsachcontroller@getsua']);
        Route::post('sua', ['as' => 'admin.chinhsach.sua', 'uses' => 'App\Http\Controllers\chinhsachcontroller@sua']);
        Route::get('xoa/{idCS}', ['as' => 'admin.chinhsach.xoa', 'uses' => 'App\Http\Controllers\chinhsachcontroller@xoa']);
    });
    Route::group(['prefix' => 'tienich'], function () {
        Route::get('danhsach', ['as' => 'admin.tienich.danhsach', 'uses' => 'App\Http\Controllers\tienichcontroller@getdanhsach']);
        Route::get('them', ['as' => 'admin.tienich.getthem', 'uses' => 'App\Http\Controllers\tienichcontroller@getthem']);
        Route::post('them', ['as' => 'admin.tienich.them', 'uses' => 'App\Http\Controllers\tienichcontroller@them']);
        Route::get('sua/{idtienich}', ['as' => 'admin.tienich.getsua', 'uses' => 'App\Http\Controllers\tienichcontroller@getsua']);
        Route::post('sua', ['as' => 'admin.tienich.sua', 'uses' => 'App\Http\Controllers\tienichcontroller@sua']);
        Route::get('xoa/{idtienich}', ['as' => 'admin.tienich.xoa', 'uses' => 'App\Http\Controllers\tienichcontroller@xoa']);
    });
    Route::group(['prefix' => 'don'], function () {
        Route::get('dondatphong', ['as' => 'admin.don.dondatphong', 'uses' => 'App\Http\Controllers\dondatphongcontroller@getdanhsach']);
        Route::get('dontheoks/{idks}', ['as' => 'admin.don.dontheoks', 'uses' => 'App\Http\Controllers\dondatphongcontroller@getdanhsachtheoks']);
        Route::get('them', ['as' => 'admin.don.getthem', 'uses' => 'App\Http\Controllers\dondatphongcontroller@getthem']);
        Route::post('them', ['as' => 'admin.don.them', 'uses' => 'App\Http\Controllers\dondatphongcontroller@them']);
        Route::get('sua/{id}', ['as' => 'admin.don.getsua', 'uses' => 'App\Http\Controllers\dondatphongcontroller@getsua']);
        Route::post('sua', ['as' => 'admin.don.sua', 'uses' => 'App\Http\Controllers\dondatphongcontroller@sua']);
        Route::get('xoa/{id}', ['as' => 'admin.don.xoa', 'uses' => 'App\Http\Controllers\dondatphongcontroller@xoa']);
        Route::post('duyet', ['as' => 'admin.don.duyet', 'uses' => 'App\Http\Controllers\dondatphongcontroller@duyet']);
    });


    Route::group(['prefix' => 'tour'], function () {
        Route::get('list', ['as' => 'admin.list.tour', 'uses' => 'App\Http\Controllers\TourController@getList']);
        Route::get('getadd', ['as' => 'admin.tour.getadd', 'uses' => 'App\Http\Controllers\TourController@getAdd']);
        Route::post('add', ['as' => 'admin.tour.add', 'uses' => 'App\Http\Controllers\TourController@add']);
        Route::get('detail/{id}', ['as' => 'admin.tour.getdetail', 'uses' => 'App\Http\Controllers\TourController@getDetail']);
        //Route::get('getupdate',['as'=>'admin.tour.getadd','uses'=>'TourController@getUpdate']);
        Route::post('update/{idtour}', ['as' => 'admin.tour.update', 'uses' => 'App\Http\Controllers\TourController@updateInfo']);
        Route::get('delimg/{idanh}', ['as' => 'admin.tour.delimg', 'uses' => 'App\Http\Controllers\TourController@delImg']);
        Route::post('updateimg/{idtour}', ['as' => 'admin.tour.updateimg', 'uses' => 'App\Http\Controllers\TourController@updateImg']);
        Route::get('delete/{idtour}', ['as' => 'admin.tour.delete', 'uses' => 'App\Http\Controllers\TourController@delete']);
    });

    Route::group(['prefix' => 'dichvu'], function () {
        Route::get('list', ['as' => 'admin.list.dichvu', 'uses' => 'App\Http\Controllers\DichVuController@getList']);
        Route::get('getadd', ['as' => 'admin.dichvu.getadd', 'uses' => 'App\Http\Controllers\DichVuController@getAdd']);
        Route::post('add', ['as' => 'admin.dichvu.add', 'uses' => 'App\Http\Controllers\DichVuController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.dichvu.getupdate', 'uses' => 'App\Http\Controllers\DichVuController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.dichvu.update', 'uses' => 'App\Http\Controllers\DichVuController@update']);
        Route::get('delete/{id}', ['as' => 'admin.dichvu.delete', 'uses' => 'App\Http\Controllers\DichVuController@delete']);
    });

    Route::group(['prefix' => 'dichvudikem'], function () {
        Route::get('getadd/{id}', ['as' => 'admin.dichvudikem.getadd', 'uses' => 'App\Http\Controllers\DichVuDiKemController@getAdd']);
        Route::post('add/{idTour}/{idDichVu}', ['as' => 'admin.dichvudikem.add', 'uses' => 'App\Http\Controllers\DichVuDiKemController@add']);
        Route::post('update/{idTour}/{idDichVu}', ['as' => 'admin.dichvudikem.update', 'uses' => 'App\Http\Controllers\DichVuDiKemController@update']);
        Route::post('delete/{idTour}/{idDichVu}', ['as' => 'admin.dichvudikem.delete', 'uses' => 'App\Http\Controllers\DichVuDiKemController@delete']);
    });

    Route::group(['prefix' => 'thanhpho'], function () {
        Route::get('list', ['as' => 'admin.list.thanhpho', 'uses' => 'App\Http\Controllers\ThanhPhoController@getList']);
        Route::get('getadd', ['as' => 'admin.thanhpho.getadd', 'uses' => 'App\Http\Controllers\ThanhPhoController@getAdd']);
        Route::post('add', ['as' => 'admin.thanhpho.add', 'uses' => 'App\Http\Controllers\ThanhPhoController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.thanhpho.getupdate', 'uses' => 'App\Http\Controllers\ThanhPhoController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.thanhpho.update', 'uses' => 'App\Http\Controllers\ThanhPhoController@update']);
        Route::get('delete/{id}', ['as' => 'admin.thanhpho.delete', 'uses' => 'App\Http\Controllers\ThanhPhoController@delete']);
    });

    Route::group(['prefix' => 'khuvuc'], function () {
        Route::get('list', ['as' => 'admin.list.khuvuc', 'uses' => 'App\Http\Controllers\KhuVucController@getList']);
        Route::get('getadd', ['as' => 'admin.khuvuc.getadd', 'uses' => 'App\Http\Controllers\KhuVucController@getAdd']);
        Route::post('add', ['as' => 'admin.khuvuc.add', 'uses' => 'App\Http\Controllers\KhuVucController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.khuvuc.getupdate', 'uses' => 'App\Http\Controllers\KhuVucController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.khuvuc.update', 'uses' => 'App\Http\Controllers\KhuVucController@update']);
        Route::get('delete/{id}', ['as' => 'admin.khuvuc.delete', 'uses' => 'App\Http\Controllers\KhuVucController@delete']);
        Route::get('getkhuvuclist/{idThanhPho}', ['as' => 'admin.khuvuc.getkhuvuclist', 'uses' => 'App\Http\Controllers\KhuVucController@getKhuVuc']);
    });

    Route::group(['prefix' => 'phuongtien'], function () {
        Route::get('list', ['as' => 'admin.list.phuongtien', 'uses' => 'App\Http\Controllers\PhuongTienController@getList']);
        Route::get('getadd', ['as' => 'admin.phuongtien.getadd', 'uses' => 'App\Http\Controllers\PhuongTienController@getAdd']);
        Route::post('add', ['as' => 'admin.phuongtien.add', 'uses' => 'App\Http\Controllers\PhuongTienController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.phuongtien.getupdate', 'uses' => 'App\Http\Controllers\PhuongTienController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.phuongtien.update', 'uses' => 'App\Http\Controllers\PhuongTienController@update']);
        Route::get('delete/{id}', ['as' => 'admin.phuongtien.delete', 'uses' => 'App\Http\Controllers\PhuongTienController@delete']);
    });

    Route::group(['prefix' => 'phuongtiendikem'], function () {
        Route::get('getadd/{id}', ['as' => 'admin.phuongtiendikem.getadd', 'uses' => 'App\Http\Controllers\PhuongTienDiKemController@getAdd']);
        Route::post('add/{idTour}/{idPhuongTien}', ['as' => 'admin.phuongtiendikem.add', 'uses' => 'App\Http\Controllers\PhuongTienDiKemController@add']);
        Route::post('update/{idTour}/{idPhuongTien}', ['as' => 'admin.phuongtiendikemdikem.update', 'uses' => 'App\Http\Controllers\PhuongTienDiKemController@update']);
        Route::post('delete/{idTour}/{idPhuongTien}', ['as' => 'admin.phuongtiendikem.delete', 'uses' => 'App\Http\Controllers\PhuongTienDiKemController@delete']);
    });

    Route::group(['prefix' => 'lichtrinh'], function () {
        Route::get('getadd/{idtour}', ['as' => 'admin.lichtrinh.getadd', 'uses' => 'App\Http\Controllers\LichTrinhController@getList']);
        Route::post('add/{id}', ['as' => 'admin.lichtrinh.add', 'uses' => 'App\Http\Controllers\LichTrinhController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.lichtrinh.getupdate', 'uses' => 'App\Http\Controllers\LichTrinhController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.lichtrinh.update', 'uses' => 'App\Http\Controllers\LichTrinhController@update']);
        Route::get('delete/{id}', ['as' => 'admin.phuongtien.delete', 'uses' => 'App\Http\Controllers\LichTrinhController@delete']);
    });

    Route::group(['prefix' => 'lichkhoihanh'], function () {
        Route::get('getadd/{idtour}', ['as' => 'admin.lichkhoihanh.getadd', 'uses' => 'App\Http\Controllers\LichKhoiHanhController@getAdd']);
        Route::post('add', ['as' => 'admin.lichkhoihanh.next', 'uses' => 'App\Http\Controllers\LichKhoiHanhController@complete']);
        Route::get('delete/{id}', ['as' => 'admin.lichkhoihanh.delete', 'uses' => 'App\Http\Controllers\LichKhoiHanhController@delete']);
    });

    Route::group(['prefix' => 'loaitour'], function () {
        Route::get('list', ['as' => 'admin.list.loaitour', 'uses' => 'App\Http\Controllers\LoaiTourController@getList']);
        Route::get('getadd', ['as' => 'admin.loaitour.getadd', 'uses' => 'App\Http\Controllers\LoaiTourController@getAdd']);
        Route::post('add', ['as' => 'admin.loaitour.add', 'uses' => 'App\Http\Controllers\LoaiTourController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.loaitour.getupdate', 'uses' => 'App\Http\Controllers\LoaiTourController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.loaitour.update', 'uses' => 'App\Http\Controllers\LoaiTourController@update']);
        /*Route::get('delete/{id}',['as'=>'admin.loaitour.delete','uses'=>'LoaiTourController@delete']);*/
    });

    Route::group(['prefix' => 'nhomnguoidung'], function () {
        Route::get('list', ['as' => 'admin.list.nhomnguoidung', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@getList']);
        Route::get('getadd', ['as' => 'admin.nhomnguoidung.getadd', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@getAdd']);
        Route::post('add', ['as' => 'admin.nhomnguoidung.add', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@add']);
        Route::get('getupdate/{id}', ['as' => 'admin.nhomnguoidung.getupdate', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@getUpdate']);
        Route::post('update/{id}', ['as' => 'admin.nhomnguoidung.update', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@update']);
        Route::get('delete/{id}', ['as' => 'admin.nhomnguoidung.delete', 'uses' => 'App\Http\Controllers\NhomNguoiDungController@delete']);
    });

    Route::group(['prefix' => 'phanquyentheonhom'], function () {
        Route::get('getlist', ['as' => 'admin.phanquyentheonhom.getlist', 'uses' => 'App\Http\Controllers\PhanQuyenTheoNhomController@getList']);
        Route::post('ajaxgetrightlist', ['as' => 'admin.getrightlist', 'uses' => 'App\Http\Controllers\PhanQuyenTheoNhomController@ajaxGetList']);
        Route::post('ajaxaddpermit', ['as' => 'admin.addpermit', 'uses' => 'App\Http\Controllers\PhanQuyenTheoNhomController@ajaxAddPermit']);
        Route::post('ajaxremovepermit', ['as' => 'admin.addpermit', 'uses' => 'App\Http\Controllers\PhanQuyenTheoNhomController@ajaxRemovePermit']);
        Route::post('ajaxaddcpermit', ['as' => 'admin.addpermit', 'uses' => 'App\Http\Controllers\PhanQuyenTheoNhomController@ajaxAddCPermit']);
    });

    Route::group(['prefix' => 'quanlykhachsan'], function () {
        Route::get('khachsaninfo', ['as' => 'admin.khachsaninfo', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@getInfoByManager']);
        Route::get('khachsanpolicy', ['as' => 'admin.khachsanpolicy', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@getPolicyByHotel']);
        Route::post('suapolicy', ['as' => 'admin.policy.sua', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@suapolicy']);
        Route::post('suakhachsaninfo', ['as' => 'admin.suakhachsaninfo', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@suakhachsaninfo']);
        Route::get('dondatphong', ['as' => 'admin.dondatphong', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@getDonByHotel']);
        Route::post('duyetdon', ['as' => 'admin.quanlykhachsan.duyetdon', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@duyet']);
        Route::post('huydon', ['as' => 'admin.quanlykhachsan.huydon', 'uses' => 'App\Http\Controllers\QuanLyKhachSanController@huyDon']);
        Route::get('them', ['as' => 'admin.quanlykhachsan.getthem', 'uses' => 'App\Http\Controllers\khachsancontroller@getthem']);
        Route::post('them', ['as' => 'admin.quanlykhachsan.them', 'uses' => 'App\Http\Controllers\khachsancontroller@them']);
    });
    Route::group(['prefix' => 'dangkykhachsan'], function () {
        Route::get('getdangky', ['as' => 'admin.dangky.getlist', 'uses' => 'App\Http\Controllers\DangKyKhachSanController@getList']);
    });
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('homepage', ['as' => 'blog.homepage', 'uses' => 'App\Http\Controllers\baivietcontroller@gethomepage']);
    Route::get('post/{id}', ['as' => 'blog.post', 'uses' => 'App\Http\Controllers\baivietcontroller@getpost']);
    Route::get('themepost/{idlt}', ['as' => 'blog.themepost', 'uses' => 'App\Http\Controllers\baivietcontroller@getthemepost']);
    Route::post('search', ['as' => 'blog.searchpost', 'uses' => 'App\Http\Controllers\baivietcontroller@getsearch']);
    Route::get('locationpost/{idkhuvuc}', ['as' => 'blog.locationpost', 'uses' => 'App\Http\Controllers\baivietcontroller@locationpost']);
});


Route::get('getview', function () {
    return view('frontendhotel.pages.home');
});
Route::get('getview1', function () {
    return view('frontend-order.home.home-content');
});
Route::get('getdata', ['as' => 'getdata', function () {
    return view('gethoteldata_ver1');
}]);

Route::get('testhomepage', ['as' => 'homepage', 'uses' => 'baivietcontroller@gethomepage']);



Route::get('dataprocess', ['as' => 'dataprocess', 'uses' => 'baivietcontroller@getdeletepart']);
Route::post('dataprocess', ['as' => 'postdeletedata', 'use' => 'baivietcontroller@savedeleted']);

Route::group(['prefix' => 'user'], function () {
    Route::get('register', ['as' => 'user.getregister', 'uses' => 'App\Http\Controllers\Auth\RegisterController@getregister']);
    Route::post('register', ['as' => 'user.postregister', 'uses' => 'App\Http\Controllers\Auth\RegisterController@postregister']);
    Route::get('login', ['as' => 'user.getlogin', 'uses' => 'App\Http\Controllers\Auth\LoginController@getlogin']);
    Route::post('login', ['as' => 'user.postlogin', 'uses' => 'App\Http\Controllers\Auth\LoginController@postlogin']);
    Route::get('logout', ['as' => 'user.logout', 'uses' => 'App\Http\Controllers\Auth\LoginController@logout']);
    Route::get('comment1/{idbv}/{iduser}', ['as' => 'user.comment1', 'uses' => 'commentcontroller@postcomment1']);
    Route::get('info/{iduser}', ['as' => 'user.info', 'uses' => 'usercontroller@getinfo']);
    Route::post('infoimg', ['as' => 'user.postimg', 'uses' => 'usercontroller@postimg']);
    Route::post('info', ['as' => 'user.postinfo', 'uses' => 'usercontroller@postinfo']);
    Route::get('cmtinfo/{iduser}', ['as' => 'user.getcmt', 'uses' => 'usercontroller@getcmt']);
    Route::get('loginsuccess', ['as' => 'success', 'uses' => 'usercontroller@getsuccess']);
    Route::get('donphonginfo/{iduser}', ['as' => 'user.donphonginfo', 'uses' => 'usercontroller@getdonphonginfo']);
});
Route::get('lienhe', ['as' => 'getlienhe', 'uses' => 'mailcontroller@getlienhe']);
Route::post('lienhe', ['as' => 'postlienhe', 'uses' => 'mailcontroller@postlienhe']);


Auth::routes();



Route::group(['prefix' => 'hotel'], function () {
    Route::get('homepage', ['as' => 'hotel.homepage', 'uses' => 'App\Http\Controllers\khachsancontroller@gethomepage']);
    Route::get('location1/{idkv}/{flag}/{idloai}/{min1}/{max1}/{idtienich}', ['as' => 'hotel.location', 'uses' => 'App\Http\Controllers\khachsancontroller@getlocation1']);
    Route::get('hotelall/{flag}/{idloai}/{min1}/{max1}/{idtienich}', ['as' => 'hotel.hotelall', 'uses' => 'App\Http\Controllers\khachsancontroller@gethotelall']);
    Route::get('detail/{idks}', ['as' => 'hotel.detail', 'uses' => 'App\Http\Controllers\khachsancontroller@gethoteldetail']);
    Route::post('search', ['as' => 'hotel.search', 'uses' => 'App\Http\Controllers\khachsancontroller@getsearch']);
    Route::post('dangkykhachsan/them', ['as' => 'dangkykhachsan.ajaxthem', 'uses' => 'App\Http\Controllers\DangKyKhachSanController@add']);
});

Route::group(['prefix' => 'Tour'], function () {
    Route::get("Homepage", ["as" => "tour.homepage", "uses" => "TourFrontEndController@getHomepage"]);
    Route::get("location/{iddiadiem}", ["as" => "tour.location", "uses" => "TourOnePageController@getByDiaDiem"]);
    Route::get("clocation/{idkhuvuc}", ["as" => "tour.clocation", "uses" => "TourOnePageController@getByKhuVuc"]);
    Route::post("tourlist", ["as" => "tour.getlist", "uses" => "TourOnePageController@getList"]);
    Route::post("tourlist_ajaxsearch", ["as" => "tour.ajaxsearch", "uses" => "TourOnePageController@ajaxSearch"]);
});
Route::group(['prefix' => 'don'], function () {
    Route::post('them', ['as' => 'admin.datdon.them', 'uses' => 'dondatphongcontroller@them']);
    Route::get('sua/{id}', ['as' => 'admin.don.getsua', 'uses' => 'dondatphongcontroller@getsua']);
});
Route::group(['prefix' => 'notice'], function () {
    Route::get('getnotice', ['as' => 'admin.notice.ajaxget', 'uses' => 'NotificationController@getNotification']);
});


Route::get('gettourdata', function () {
    return view('gettourdata_v1');
});
