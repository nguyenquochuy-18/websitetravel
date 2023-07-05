@extends('touradmin.layout.bodycontent')
@section('title')
    Danh sách user
@endsection

@section('content')
    {{-- <h1>Thành viên - danhsach</h1>

<div class="col-lg-12" style="margin-bottom: 20px;">
	<a href="{{route('admin.user.getthem')}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add</button></a>
</div>
<div class="container">
<div class="row">
	<table class="table_id table table-striped table-bordered table-hover" style="width: 100%;" id="myTable">
	<thead>
	<tr align="center">
		<td> Mã </td>
		<td> Họ Tên </td>
		<td>Email </td>
		<td> Chức vụ </td>
		<td> Ngày tạo </td>
		<td>Sửa</td>
		<td>Xóa</td>
	</tr>
	</thead>
	<tbody>
	@foreach ($danhsach as $danhsach1)
	<tr class="odd gradeX">
		<td>{{$danhsach1->id}}</td>
		<td>{{$danhsach1->name}}</td>
		<td>{{$danhsach1->email}}</td>
		<td></td>
		<td>{{$danhsach1->created_at}}</td>
		<td> <a href="{{ url('admin/user/sua',['iduser'=>$danhsach1->id])}}" >Sửa</a></td>
		<td> <a href="{{ url('admin/user/xoa',['iduser'=>$danhsach1->id])}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa ?')">xóa</a></td>
	</tr>
@endforeach
</tbody>
</table>
</div>
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
                        @if (session('cusError'))
                            <div class="alert alert-danger" role="alert">
                                <span>{{ session('cusError') }}</span>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif
                        <h3>User - List</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('admin.user.getthem') }}"><button
                                        class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item</button></a>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="right">Email</th>
                                        <th>Permission</th>
                                        <th>Avatar</th>
                                        <th>Created_at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhsach as $item)
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <span class="block-email">{{ $item->name }}</span>
                                            </td>
                                            <td class="desc ">{{ $item->email }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>
                                                <span class="status--process">{{ $item->avatar }}</span>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <div class="table-data-feature">


                                                    <form
                                                        action="{{ route('admin.user.getsua', ['iduser' => $item->id]) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.user.xoa', ['iduser' => $item->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </form>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
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
