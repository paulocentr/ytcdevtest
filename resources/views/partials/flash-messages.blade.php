
@if ($modelclass = Session::get('modelclass') && $modelid = Session::get('modelid'))
@php
	// $restoreurl = '
	// 	<form method="POST" action="'.route('painel.undo.delete').'">
	// 		<input type="hidden" name="modelclass" value="'.$modelclass.'">
	// 		<input type="hidden" name="modelid" value="'.$modelid.'">
	// 		<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-undo"></i> Desfazer</button>
	// 		' . csrf_field() . '
	// 	</form>
	// ';
	$restoreurl = '';
@endphp
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{!! $message !!}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{!! $message !!}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{!! $message !!}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{!! $message !!}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
</div>
@endif