@extends('layouts.layout')
@section('main')

<div class="row">
	<div class="col-sm-9">
		<a href="{{route('auth/login')}}" class="btn btn-primary " role="button">Sign in</a>

		<a href="{{route('register')}}" class="btn btn-primary " role="button">Sign up</a>
		<br>
		<br>
		<div class="panel panel-default" style="word-wrap: break-word">
	{{$ct->coderz}}

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
	
       
           
            
        

		<br>
			<div class="panel-footer">

 Only registered users can write down the comments
			</div>

		</div>
	</div>
</div>

@if (count($errors) > 0)

	<div class="alert alert-danger">
		<strong>Error!</strong>

		<br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@endsection