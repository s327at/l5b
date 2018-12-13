@extends('layouts.layout_boot')

@section('main')

    
    <a href="{{ route('auth/login')}}">Вход</a><br>
    <br>
    <a href="{{ route('register') }}">Регистрация</a><br>

   

    <br>
    <table border=1>
        @foreach ($ctat as $mois)
            <tr>
                <td>{{$mois->datetime }}</td>
                <td>{{$mois->coderz }}</td>
                <td>

                    <a href="{{route('show.show',  $mois->id) }}">Читать дальше</a><br>
                <td>	коментариев {{$chiszap = DB::table('comments')->where('moictati_id' , '=' , $mois->id)->count()}}</td>

                </td>
            </tr>

        @endforeach
    </table>


    @if(!empty($message))
        {{$message}}
    @endif
    @stop

