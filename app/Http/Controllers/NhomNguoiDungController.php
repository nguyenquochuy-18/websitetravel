<?php

namespace App\Http\Controllers;

use App\NhomNguoiDung;
use App\User;
use App\Http\Requests\NhomNguoiDungRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

define("BASIC_USER_GROUP", 1);
class NhomNguoiDungController extends Controller
{

    public function getList()
    {
        $columns = DB::connection()->getSchemaBuilder()->getColumnListing("nhomnguoidung");
        $nhomnguoidung = NhomNguoiDung::all();
        $Content = 'nhomnguoidung';
        return view('touradmin/listpage/list', ['danhsach' => $nhomnguoidung, 'title' => "Danh sách nhóm người dùng", 'columns' => $columns, 'content' => $Content]);
    }

    public function getAdd()
    {
        return view("touradmin/nhomnguoidung/add");
    }

    public function add(NhomNguoiDungRequest $request)
    {
        // NhomNguoiDungRequest
        $nhomnguoidung = new NhomNguoiDung();
        $nhomnguoidung->ID = $request->id;
        $nhomnguoidung->TenNhomNguoiDung = $request->ten;
        $str = strip_tags($request->mota, '');
        $nhomnguoidung->MoTa = $str;
        $nhomnguoidung->save();
        return redirect()->route('admin.nhomnguoidung.getadd')->with('status', 'Success');
    }

    public function getUpdate($id)
    {
        $nhomnguoidung = DB::table('nhomnguoidung')->where('ID', $id)->first();
        return view("touradmin/nhomnguoidung/update", ['nhomnguoidung' => $nhomnguoidung]);
    }

    public function update($id, NhomNguoiDungRequest $request)
    {
        $str = strip_tags($request->mota, '');

        DB::table('nhomnguoidung')->where('ID', $id)->update(['TenNhomNguoiDung' => $request->ten, 'MoTa' => $str]);
        return redirect()->route('admin.nhomnguoidung.getupdate', ['id' => $id])->with('status', 'Success')->with("demo", $str);
    }

    public function delete($id)
    {
        if ($id == BASIC_USER_GROUP) {
            return redirect()->route('admin.list.nhomnguoidung')->with('cusError', 'Không thể xóa nhóm người dùng cơ bản');
        }
        $nhomnguoidung = NhomNguoiDung::where("ID", $id)->first();
        User::where('level', $nhomnguoidung->ID)->update(['level' => BASIC_USER_GROUP]);
        NhomNguoiDung::where('ID', $id)->delete();
        return redirect()->route('admin.list.nhomnguoidung')->with('status', 'Delete Success');
    }
}
