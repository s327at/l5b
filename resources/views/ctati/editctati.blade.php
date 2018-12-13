@extends('layouts.layout')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" action = {{route('blog.ctati.update', ['id' => $ctatia->id])}} method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label class="col-md-4 control-label" name="name"> Content: </label>

                    <input maxlength="400" size="120" name="coderz" value="{{$ctatia->coderz}}">

                    <button class="btn btn-info" type="submit" >Send</button>

                </form>
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
