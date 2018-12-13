@extends('layouts.layout_admin')
@section('main')

    <div class="container">
        <div class="col-md-8 col-md-push-1">
            <div class="panel panel-default" style="word-wrap: break-word">

        @foreach ($comments as $commen)
            <tr>

                <td>{{ $commen->created_at }}</td>
                <td>{{ $commen->body }}</td>

                <form class="=form-horizontal" action="{{route('admin.modcomment', ['id' => $commen->id])}}"method="POST" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                Publish
                        </button>

                    </form>


            </tr>



        @endforeach

    <br>



@stop
        </div>
    </div>
    </div>