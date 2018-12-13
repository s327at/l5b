@extends('layouts.layout')
@section('main')

<ul class="nav nav-pills">

	<a href="{{route('user.index')}}">Мой профиль</a><br>

</ul>



	<div class="row">
		<div class="col-sm-10">
			<div class="panel panel-default" style="word-wrap:break-word">


	@foreach ($comments as $commen)
					<tr>
					
                    <td>{{ $commen->created_at }}</td>
                    <td>{{ $commen->body }}</td>

						<td>
							<form class="form-horizontal" role="form" method="GET" action="{{route('comments.edit', ['id' => $commen->id])}}">

								{!! csrf_field() !!}
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Edit
								</button>
								</form>

						</td>
                    <td>
						<form action ="{{route('comments.destroy', ['id' => $commen->id])}}"  method="POST">

								<input type="hidden" name="_method" value="DELETE">
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger" style="margin-right: 15px;">
								Delete
							</button>
						</form>

					</td>
                    				</tr>
							@endforeach




</div>
		</div>
	</div>


