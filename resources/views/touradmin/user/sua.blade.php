@extends('touradmin.layout.bodycontent')
@section('title')
    Sửa User
@endsection
@section('css')
@endsection
@section('content')
    {{--
<h1>Thành Viên - Sửa</h1>

<form action="{!!route('admin.user.sua')!!}" method="post" class="form-vertical">
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $errors)
		<li>{!!$errors!!}</li>
	@endforeach
	</ul>
</div>
@endif
{{ csrf_field() }}
<div class="form-group">
	<label>id :</label>
	<input type="text" name="ma" class="form-control" value="{!! $user->id !!}" readonly>
</div>
<div class="form-group">
	<label>Tên:</label>
	<input type="text" name="name" class="form-control" value="{!! $user->name !!}">
</div>
<div class="form-group">
	<input type="checkbox" id="passwordchange">Đổi mật khẩu
</div>

<div class="form-group">
	<label>Mật khẩu</label>
	<input type="password" name="password" class="form-control password" disabled>
</div>
<div class="form-group">
	<label>Xác nhận mật khẩu :</label>
	<input type="password" name="confirmpassword" class="form-control password" disabled>
</div>
<div class="form-group">
	<label>Chức vụ </label>
	<select name="level" class="form-control">
	<?php $curchucvu = DB::table('nhomnguoidung')
     ->where('ID', [$user->level])
     ->get()
     ->first(); ?>
		<option value="{!!  $curchucvu->ID!!}"><?php echo $curchucvu->TenNhomNguoiDung; ?></option>
		<?php $chucvu=DB::table('nhomnguoidung')->whereNotIn('ID',[$user->level])->get();
		foreach($chucvu as $chucvuitem){
			?>
		<option value="{{ $chucvuitem->ID}}">{{$chucvuitem->TenNhomNguoiDung}} </option>
		<?php
		}
		 ?>

	</select>
</div>
<button type="submit" class="btn btn-primary"> Sửa </button>
<button type="reset" class="btn btn-primary"> reset </button>
</form>

@endsection
@section('script')
<script >
 $(document).ready(function(){
 	$("#passwordchange").change(function(){
 		if($(this).is(":checked")){
 			$(".password").removeAttr('disabled');
 		}
 		else{
 			$(".password").attr('disabled','');
 		}
 	});
 });

</script> --}}

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <form action="{{ route('admin.user.sua', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="id"
                            value="{{ $user->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}"
                            name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Permission</label>
                        <select name="permission" class="form-control" id="exampleFormControlInput1">

                            <?php $curchucvu = DB::table('nhomnguoidung')
                                ->where('ID', [$user->level])
                                ->get()
                                ->first(); ?>
                            <option value="{!! $curchucvu->ID !!}"><?php echo $curchucvu->TenNhomNguoiDung; ?></option>
                            <?php $chucvu=DB::table('nhomnguoidung')->whereNotIn('ID',[$user->level])->get();
                                foreach($chucvu as $chucvuitem){
                                    ?>
                            <option value="{{ $chucvuitem->ID }}">{{ $chucvuitem->TenNhomNguoiDung }} </option>
                            <?php
                                }
                            ?>

                        </select>

                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
