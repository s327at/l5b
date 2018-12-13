@extends('layouts.layout_admin')

@section('main')






	<div class="col-md-9 col-md-pull-1">
<br>
<a href="{{route('auth/logout')}}">Log out </a><br>

			<form action={{route('blog.ctati.create')}} method="GET">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-info">
					Add new article
				</button>
			</form>


		<div class="panel panel-default" style="word-wrap: break-word">
	@foreach ($moistat as $mois)


                    {{ $mois->coderz }}


						<div class="panel-footer">
							<table>
							<tr>
							<td>{{ $mois->datetime }}</td>
					<td>	<form action={{route('blog.ctati.edit', ['id'=>$mois->id])}} method="GET">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-warning">
									Edit
								</button>
							</form>
					</td>



					<td>	<form action=" {{route('blog.ctati.destroy', ['id'=>$mois->id])}}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
						{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger">
								Delete
							</button>
                         </form>
					</td>

							</tr>
							</table>
						</div>

		@endforeach

	</div>
		

@stop

	</div>
