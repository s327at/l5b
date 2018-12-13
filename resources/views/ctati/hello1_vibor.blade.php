@extends('layouts.layout')
@section('main')

<br>
<table border=1>
	@foreach ($vibor as $mois)
		<tr>
			<td>{{$mois->datetime }}</td>
			<td>{{$mois->coderz }}</td>
			<td>

			</td>
		</tr>

	@endforeach
</table>

