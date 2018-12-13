@extends('layouts.user')


@section('main')




 <div class="span12 dcontent">
     <div class="tabbable">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">My Profile</a></li>
      <!--    <li><a href="#tab2" data-toggle="tab">Change Password1</a></li>  -->
   <!--   <a href=http://localhost/l4/public/myaccount/changepassword">Change Password</a>
          <li><a href="#tab3" data-toggle="tab">My Orders</a></li> -->
        </ul>
      <div class="tab-content">

      <!-- My account tab start -->
      <div class="tab-pane active" id="tab1">

        [[ Form::model($user, array('method' => 'PATCH', 'route' => array('user.update', $user->id))) ]]
        
       <div class="control-group">
        <label class="control-label" for="Username">Логин :</label>
        <div class="controls">
          <input type="text" name="username" id="usernsme" value="[[ $user->username ]]" placeholder="">
        </div>
       
      <div class="control-group">
        <label class="control-label" for="first_name">First Name :</label>
        <div class="controls">
          <input type="text" name="first_name" id="first_name" value="[[ $user->first_name ]]" placeholder="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="last_name">Last Name :</label>
        <div class="controls">
          <input type="text" name="last_name" id="last_name" value="[[ $user->last_name ]]" placeholder="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="rto">Email :</label>
        <div class="controls">
          <input type="text" name="email" id="email" value="[[ $user->email ]]" placeholder="">
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
      [[ Form::close() ]]
      </div>
      <!-- My account tab close -->



     </div>

     </div>

</div>