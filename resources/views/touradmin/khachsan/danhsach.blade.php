@extends('touradmin.layout.bodycontent')
@section('title')
    Danh sách khách sạn
@endsection
@section('content')
    <h1>Khách Sạn- danhsach</h1>

    <div class="col-lg-12" style="margin-bottom: 20px;">
        <a href="{{ route('admin.khachsan.getthem') }}"><button type="button" class="btn btn-primary"><span
                    class="glyphicon glyphicon-plus"></span> Add</button></a>
    </div>
    {{-- <div class="container" style=" width: 100%;">
	<table class="table_id table table-hover table-bordered table-condensed" style="table-layout: fixed; width: 100%;" id="myTable">
	<thead>
	<tr>
		<td>Mã khách sạn </td>
		<td>Tên khách sạn </td>
		<td>Địa chỉ </td>
		<td>Số phòng </td>
		<td>Liên hệ </td>
		<td>Danh sách đơn đặt phòng</td>
		<td>Sửa chính sách</td>
		<td>Sửa thông tin khách sạn </td>
		<td>Xóa </td>
	</tr>
	</thead>
	<tbody>
	@foreach ($danhsach as $danhsach1)
	<tr>
		<td>{{$danhsach1->IDKhachSan}}</td>
		<td>{{$danhsach1->TenKhachSan}}</td>
		<td>{{$danhsach1->DiaChi}}</td>
		<td>{{$danhsach1->SoPhong}}</td>
		<td>{{$danhsach1->LienHe}}</td>
		<td><a href="{{url('admin/don/dontheoks/'.$danhsach1->IDKhachSan)}}">Xem</a></td>
		<td> <a href="{!! url('admin/chinhsach/sua/'.$danhsach1->IDKhachSan)!!}">Sửa</a></td>
		<td> <a href="sua/{{$danhsach1->IDKhachSan}}">Sửa</a></td>
		<td> <a href="xoa/{{$danhsach1->IDKhachSan}}" onclick=" return xacnhanxoa('Bạn có chắc chắn muốn xóa khách sạn này , toàn bộ thông tin về khách sạn sẽ bị hủy')">Xóa</a></td>
	</tr>
@endforeach
</tbody>
</table>
</div> --}}

    <style>
        .right {
            width: 20px;
        }
    </style>
    <!-- MAIN CONTENT-->
    <div class="main-content ">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->

                        <h3 class="title-5 m-b-35">data table</h3>

                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>

                                        <th>Mã </th>
                                        <th>Tên </th>
                                        <th>Địa chỉ </th>
                                        <th>Số phòng </th>
                                        <th>Liên hệ </th>
                                        <th>Danh sách đơn đặt phòng</th>
                                        <th>Sửa chính sách</th>
                                        <th>Sửa thông tin khách sạn </th>
                                        <th>Xóa </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhsach as $danhsach1)
                                        <tr class="tr-shadow">

                                            <td>{{ $danhsach1->IDKhachSan }}</td>
                                            <td>{{ $danhsach1->TenKhachSan }}</td>
                                            <td>{{ $danhsach1->DiaChi }}</td>
                                            <td>{{ $danhsach1->SoPhong }}</td>
                                            <td>{{ $danhsach1->LienHe }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <form
                                                        action="{{ url('admin/don/dontheoks/' . $danhsach1->IDKhachSan) }}"
                                                        method="post">
                                                        @csrf
                                                        {{-- @method('delete') --}}
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Move">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <form action="{!! url('admin/chinhsach/sua/' . $danhsach1->IDKhachSan) !!}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <form action="sua/{{ $danhsach1->IDKhachSan }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">


                                                    <form action="xoa/{{ $danhsach1->IDKhachSan }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>


                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
