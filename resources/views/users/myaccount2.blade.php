@extends('layouts.layout')

<div class="container-fluid">
    <div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">My profile</h3>
    </div>


<form class="form-horizontal" role="form" method="POST" action="{{route('user.update', ['id'=>$user->id])}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden"  name="_method" value="PUT">
    <div class="form-group">
        <label  class="col-sm-2 control-label">Login</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
        </div>
    </div>

    <div class="form-group">
        <label  class="col-sm-2 control-label">Email</label>

        <div class="col-sm-6">
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
        </div>
    </div>


    <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn">
            Save
        </button>
    </div>
    </div>
</form>
</div>
</div>

    </div>

</div>

<br>


<form class="form-horizontal" role="form" action="{{route('user.destroy', ['id'=>$user->id])}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden"  name="_method" value="DELETE">
<div class="col-md-6 col-md-offset-4">
    <button type="submit" class="btn btn-danger">
        Delete account
    </button>

</div>
</form>

