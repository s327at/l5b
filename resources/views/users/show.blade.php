@extends('layouts.user')


@section('main')
@if(!empty($message))
{{$message}}
@endif
@if(!empty($errors))
@foreach ( $errors->all() as $error )
 <div class="error"> {{ $error}}  </div>
@endforeach
@endif