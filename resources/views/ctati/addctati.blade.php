@extends('layouts.layout_admin')
@section('main')

	<div class="container">
		<div class="col-md-8 col-md-push-4">

<form class="form-horizontal" role="form" method="POST" action="{{route('blog.ctati.store')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group" >
		<label class="col-md-4 control-label" name="name">Text: </label>
		<div class="col-md-9">
			<input type="textarea" class="form-control col-md-4" name="coderz" value=" ">
		</div>
		<div class="col-md-2">
			<select class="form-control " name="tag">
				<option value="Laravel">Laravel</option>
				<option value="AngularJS">AngularJS</option>
				<option value="Ubuntu">Ubuntu</option>

			</select>

		</div>
	</div>

		<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
		Submit
	</button>

</form>
		</div>
	</div>