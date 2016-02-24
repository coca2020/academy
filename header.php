

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Future Academy</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo $base_url; ?>">Home</a></li>
        <li><a href="<?php echo $base_url.'?route=courses'; ?>">Course</a></li>
        <li><a href="<?php echo $base_url.'?route=aboutus'; ?>">About Us</a></li> 
        <li><a href="<?php echo $base_url.'?route=contactus'; ?>">Contact Us</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">



<?php

 if(isset($_GET['route']) && $_GET['route']=='logout' )
 {
   session_unset();//Just clear all data of all session variable, no need sesson start again.
   session_destroy();//deleting the whole session.set session_start again to work with the session.
   header('Location: ' . $base_url);
 }


        if(!isset($_SESSION['user_data']))
        {
       ?>
        <li><a href="<?php echo $base_url.'?route=register'; ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?php echo $base_url.'?route=login'; ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php 
          }
           ?>


      <?php
        if(isset($_SESSION['user_data']) && $_SESSION['user_data']['group_name']=='admin')
        {
       ?>
        <li><a href="<?php echo $base_url.'admin'; ?>"><span class="glyphicon glyphicon-user"></span>Admin</a></li>
          <?php 
          }
           ?>


        <?php
        if(isset($_SESSION['user_data']))
        {
       ?>
        <li><a href="<?php echo $base_url.'?route=profile'; ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
       <li><a href="<?php echo $base_url.'?route=logout'; ?>"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
        <?php
         } 
         ?>









      </ul>
    </div>
  </div>
</nav>