@extends('touradmin.layout.bodycontent')
@section('title')
    Thêm nhóm người dùng
@endsection
@section('content')
    <div class="list-title">Add nhóm người dùng</div>
    <div>
        <ol class="breadcrumb">
            <li>
                <a href="#">DashBoard</a>
            </li>
            <li>
                <a href="{{ route('admin.list.nhomnguoidung') }}">Nhóm người dùng</a>
            </li>
            <li class="active">Thêm</li>
        </ol>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default form">
        <div class="panel-heading">Thêm nhóm người dùng </div>
        <div class="panel-body">
            <form action="{{ route('admin.nhomnguoidung.add') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2">ID nhóm người dùng</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" class="form-control" placeholder="ID">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên nhóm người dùng</label>
                    <div class="col-sm-10">
                        <input type="text" name="ten" class="form-control" placeholder="Tên Dịch vụ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea id="describe" name="mota" class="form-control"></textarea>
                        {{-- <input type="text" id="floranote" name="mota" class="form-control" /> --}}
                    </div>
                </div>
                <div style="margin-left: 300px;"><button type="submit" class="btn btn-primary">Thêm</button></div>
            </form>
        </div>
    </div>
@endsection
