<!DOCTYPE HTML>
<html id="ng-app" ng-app="app"> <!-- id="ng-app" IE<8 -->
<head>
   [[ HTML::style('bootstrap/css/bootstrap.min.css') ]]
    [[ HTML::style('app/css/animate.min.css') ]]
    [[ HTML::style('app/css/angular.css') ]]
    [[ HTML::script('bootstrap/js/bootstrap.min.js') ]]
    [[ HTML::script('app/lib/angular/angular.min.js') ]]
    [[ HTML::script('app/lib/angular/modules/tabs.js') ]]
    [[ HTML::script('app/controllers/controller_tab.js') ]]

    <script>
        angular.module("app").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
    </script>


</head>

<body ng-controller="TestController">

<div class="container">
    <h1></h1>

    <div ng-tabs class="tabbable">





        <ul class="nav nav-tabs">
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Мой профиль</a>
            </li>
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Изменить профиль</a>
            </li>
            <li ng-tab-head="active">
                <a href="#" ng-click="$event.preventDefault()">Удалить профиль</a>
            </li>

        </ul>
        <div class="tab-content" style="overflow: hidden">
            <div ng-tab-body="animated bounceInLeft" class="tab-pane">
                <ul>
                    [[ Form::open() ]]
                    <li><label>Логин :</label></li>
                    <li><div class="controls">
                            <input type="text" name="username" id="usernsme" value="[[ $user->username ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="first_name">Имя :</label></li>
                    <li><div class="controls">
                            <input type="text" name="first_name" id="first_name" value="[[ $user->first_name ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="first_name">Фамилия :</label></li>
                    <li><div class="controls">
                            <input type="text" name="first_name" id="first_name" value="[[ $user->last_name ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="rto">Email :</label></li>
                    <li><div class="controls">
                            <input type="text" name="email" id="email" value="[[ $user['email'] ]]" placeholder="">
                        </div></li>
                    [[Form::close() ]]
                </ul>
            </div>
            <div ng-tab-body="animated fadeInUpBig" class="tab-pane">
                <ul>
                    [[ Form::open() ]]
                    [[ Form::model($user, array('method' => 'PATCH', 'route' => array('user.update', $user->id))) ]]
                    <li><label>Логин :</label></li>
                    <li><div class="controls">
                            <input type="text" name="username" id="usernsme" value="[[ $user->username ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="first_name">Имя :</label></li>
                    <li><div class="controls">
                            <input type="text" name="first_name" id="first_name" value="[[ $user->first_name ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="first_name">Фамилия :</label></li>
                    <li><div class="controls">
                            <input type="text" name="first_name" id="first_name" value="[[ $user->last_name ]]" placeholder="">
                        </div></li>
                    <li><label class="control-label" for="rto">Email :</label></li>
                    <li><div class="controls">
                            <input type="text" name="email" id="email" value="[[ $user->email ]]" placeholder="">
                        </div></li>
                    <br>
                    <li> <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div></li>


                    [[Form::close() ]]
                </ul>

            </div>
            <div ng-tab-body="animated fadeInRightBig" class="tab-pane">
                [[ Form::open() ]]
                [[Form::open(array('method'=> 'DELETE', 'route' => array('user.destroy', $user->id))) ]]
                Нажав кнопку Вы удалите все данные о себе, все свои статьи и комментарии
                [[ Form::submit('Удалить', array('class' =>'btn btn-danger')) ]]
                [[ Form::close() ]]

            </div>

        </div>
    </div>
</div>

</body>
</html>






