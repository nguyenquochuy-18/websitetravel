@extends('touradmin.layout.bodycontent')
@section('title') Thêm thành phố
@endsection
@section('content')
<div class="list-title">Add thành phố</div>
<div><ol class="breadcrumb">
	<li>
		<a href="#">DashBoard</a>
	</li>
	<li>
		<a href="{{route('admin.list.thanhpho')}}">Thành phố</a>
	</li>
	<li class="active">Thêm</li>
</ol>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach
		</ul>
	</div>
@endif
<div class="panel panel-default form">
<div class="panel-heading">Thêm thành phố </div>
<div class="panel-body">
<form action="{{route('admin.thanhpho.add')}}" method="post" class="form-horizontal">
{{ csrf_field() }}
	<div class="form-group">
		<label class="control-label col-sm-2">Tên thành phố</label>
		<div class="col-sm-10"> 
		<input type="text" name="ten" class="form-control" placeholder="Tên Thành Phố">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">Giới thiệu</label>
		<div class="col-sm-10"> 
		<textarea name="gioithieu"  class="form-control"></textarea>
		</div>
	</div>
	<div style="margin-left: 300px;"><button type="submit" class="btn btn-primary">Thêm</button></div>
</form>
</div>
</div>
@endsection