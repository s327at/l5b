@extends('layouts.layout_boot')

@section('main')

<div class="row">


<br>

	<div class="col-sm-9">
		<a href="{{route('auth/login')}}" class="btn btn-primary " role="button">Sign in</a>

		<a href="{{route('register')}}" class="btn btn-primary " role="button">Sign up</a>

<br>
		@if (!Auth::check())
			<div class="hidden">
		        <a href="{{route('auth/logout')}}">Log out </a><br>
				<a href="{{route('user.index', ['prefix' =>'blog'])}}">My profile</a><br>
			</div>
        @else
			<div class="show">
				<a href="{{route('auth/logout')}}">Log out </a><br>
				<a href="{{route('user.index', ['prefix' =>'blog'])}}">My profile</a><br>
			</div>
		@endif
		<br>

		<div class="panel panel-default" style="word-wrap: break-word">


		@foreach ($moistat as $mois)


				<div>{{$mois->coderz }}</div>
			<div class="panel-footer">
				<td>{{$mois->datetime }}</td>
				<td><a href="{{route('show.show',  $mois->id, ['prefix' =>'blog']) }}">'Read more'</a></td>
				<td>comments <span class="badge">{{$chiszap = DB::table('comments')->where('moictati_id' , '=' , $mois->id)->count()}}</span></td>
			</div>

		@endforeach


	</div>

	</div>


@if(!empty($message))
{{$message}}
@endif

<br>





	<div class="col-sm-3">


<form method="POST" action="{{route('search')}}">

	<div class="container">
		<div class="col-sm-3">
			<form class="navbar-form" role="search">
				<div class="input-group add-on">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="form-control"  name="naiti"  type="text">
					<div class="input-group-btn">
						<button class="btn btn-info" type="submit">Search</button>
					</div>
				</div>
			</form>


		</div>
	</div>

</form>


@section('bok_pan')

	<div class="container">

		<div class="col-sm-3">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								Article categories
							</h4>
						</div>

							<div class="panel-body">
								<table class="table">
									<tr>
										<td>
											<span></span><a href="{{route('show.ctatitag',  $mois->tag = 'Laravel')}}">Laravel</a> ({{$lar}})
										</td>
									</tr>
									<tr>
										<td>
											<span></span><a href="{{route('show.ctatitag',  $mois->tag = 'AngularJS')}}">AngularJS</a> ({{$ang}})
										</td>
									</tr>
									<tr>
										<td>
											<span></span><a href="{{route('show.ctatitag',  $mois->tag = 'Ubuntu')}} ">Ubuntu</a>({{$ubu}})
										</td>
									</tr>
									<tr>

									</tr>
								</table>
							</div>
						</div>



		</div>
	</div>
		</div>
	</div>
</div>
@stop

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