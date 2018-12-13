@extends('layouts.layout_admin')
@section('main')
    <div class="container">
        <div class="col-md-8 col-md-push-1">
            <div class="panel panel-default">
<table class="table table-bordered">
    <thead>
    <tr>
        <td><strong>email</strong></td>
        <td><strong>isActivated</strong></td>
        <td><strong>name</strong></td>
    </tr>
    </thead>
    @foreach ($alluser as $alluse)
        <tr>
            <td>{{$alluse->email }}</td>
            <td>{{$alluse->activated }}</td>
           {{-- <td>{{$alluse->last_login }}</td>
            <td>{{$alluse->first_name }}</td>
            <td>{{$alluse->last_name }}</td>--}}
            <td>{{$alluse->name }}</td>

            <td><form action="{{route('admin.ban', ['id' => $alluse->id])}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" >
                        Ban
                    </button>
                </form>
            </td>
            <td><form action="{{route('admin.unban', ['id' => $alluse->id])}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" >
                        Unban
                    </button>
                </form>
            </td>
        </tr>

    @endforeach
</table>

            </div>
        </div>
    </div>
    @endsection