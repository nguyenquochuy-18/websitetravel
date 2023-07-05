@extends('touradmin.layout.bodycontent')
@section('title')
    Danh sách
@endsection
@section('content')
    @if ($danhsach == null)
    @endif
    <div class="list-title">{{ $title }}</div>
    <div>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">{{ $title }}</li>
        </ol>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('cusError'))
        <div class="alert alert-danger">
            {{ session('cusError') }}
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
    {{-- <div class="table">
        <div class="addBtn" style="margin-bottom:10px "><a href="{{ route('admin.' . $content . '.getadd') }}"><button
                    type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> Add</span></button></a>
        </div>
        <table id="table_id" class="display">
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                    <td>Sửa</td>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhsach as $danhsachitem)
                    <tr>
                        @foreach ($columns as $column)
                            <td>{{ $danhsachitem->$column }}</td>
                        @endforeach
                        <td><a href="{{ url('admin/' . $content . '/getupdate/' . $danhsachitem->ID) }}">Sửa</a></td>
                        <td><a href="{{ url('admin/' . $content . '/delete/' . $danhsachitem->ID) }}">Xóa</a></td>
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

                        <h3 class="title-5 m-b-35">Group User - List</h3>
                        <div class="table-data__tool">

                            <div class="table-data__tool-right">
                                <a href="{{ route('admin.' . $content . '.getadd') }}"><button
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
                                        @foreach ($columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
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
                                            @foreach ($columns as $column)
                                                <td>{{ $item->$column }}</td>
                                            @endforeach
                                            <td>
                                                <div class="table-data-feature">


                                                    <form
                                                        action="{{ url('admin/' . $content . '/getupdate/' . $item->ID) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ url('admin/' . $content . '/delete/' . $item->ID) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('get')
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
