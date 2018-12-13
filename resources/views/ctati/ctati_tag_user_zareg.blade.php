@extends('layouts.layout_boot')

@section('main')

    <a href="{{route('auth/login')}}">Login</a><br>
    <a href="{{route('register')}}">Register </a>
<br>


<br>

зарегистрированный юзер

<br>
<table border=1>
    @foreach ($ctat as $mois)
    <tr>
        <td>{{$mois->datetime }}</td>
        <td>{{$mois->coderz }}</td>
        <td>

            <a href="{{route('show.show', ['id'=>$mois->id])}}">Read more </a><br>
        <td>	коментариев {{$chiszap = DB::table('comments')->where('moictati_id' , '=' , $mois->id)->count()}}</td>
        </form>
        </td>
    </tr>

    @endforeach
</table>


@if(!empty($message))
{{$message}}
@endif
@stop

