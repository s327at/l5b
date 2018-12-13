@extends('public.layouts.user')
@section('main')
/**
 * Created by PhpStorm.
 * User: gg
 * Date: 22.09.14
 * Time: 14:00
 */
<td>[[Form::open(array('method'=> 'DELETE', 'route' => array('user.destroy', $user->id)))]]
    Нажав кнопку Вы удалите все данные о себе, все свои статьи и комментарии
    [[ Form::submit('Удалить', array('class' =>'btn btn-danger')) ]]
    [[ Form::close()]]