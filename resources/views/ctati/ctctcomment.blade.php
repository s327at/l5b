@extends('layouts.layout')
@section('main')





<div class="container-fluid">
<div class="row">
	<div class="col-sm-9">
<div class="panel panel-default" style="word-wrap: break-word">
	{{$ct->coderz}}
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Comments</h3>
		</div>
	@foreach ($com as $comme)
					{{$comme->created_at}}
					{{ $comme->body }}
                  
                    				<br>
                    				
							@endforeach

	</div>


	<form class="form-horizontal" role="form" method="POST" action="{{route('comments.store')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


		<div class="form-group" >
			<label class="col-md-4 control-label" name="name"> Write down comments: </label>
			<div class="col-md-6">
				<textarea class="form-control" rows="3" name="body" value=" "></textarea>
			</div>
		</div>

		<input type="hidden" name="moictati_id" value="{{ $ct->id}}">

		<input type="hidden" name="user_id" value="{{$uid}}">

        



			<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
				Send comments
			</button>
			

			<br>









</form>
</div>
	</div>
</div>
</div>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif