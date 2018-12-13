@extends('layouts.layout')
@section('main')
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
<form class="form-horizontal" role="form" action = {{route('comments.update', ['id' => $comment->id])}} method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <label class="col-md-4 control-label" name="name"> Comments: </label>

        <input maxlength="400" size="120" name="body" value="{{$comment->body}}">

    <button class="btn btn-info" type="submit" >Send</button>

</form>
        </div>
    </div>
    </div>

@endsection
