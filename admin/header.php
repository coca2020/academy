
<?php
    $url=str_replace('/admin', '', $base_url).'?route=home';

?>
<nav class="navbar navbar-inverse">
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
        <li class="active"><a href="<?php echo $url; ?>">Front Site</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">



<?php

 if(isset($_GET['route']) && $_GET['route']=='logout')
 {
  // unset($_SESSION['user_name']);
  // unset($_SESSION['email']);
  session_unset();
   session_destroy();
   header('Location: ' . $base_url);
 }
           ?>

        <?php
        if(isset($_SESSION['user_data']['user_name']))
        {
       ?>
        <li><a href="<?php echo $base_url.'/?route=logout'; ?>"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
        <?php
         } 
         ?>









      </ul>
    </div>
  </div>
</nav>