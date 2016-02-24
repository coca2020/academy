<!DOCTYPE html>
<html>
<?php
//echo dirname(__FILE__);
//print_r($_SERVER);
//echo $_SERVER['DOCUMENT_ROOT'];
//exit();

/*
  //set user name cookie
$cookie_name = "user_name";
$cookie_value = "ali";
setcookie($cookie_name, $cookie_value, time() + (24*60*60), "/"); // 86400 = 1 day
//set password cookie
$cookie_name = "password";
$cookie_value = "oidaosidaiod";
setcookie($cookie_name, $cookie_value, time() + (24*60*60), "/"); // 86400 = 1 day
//setcookie( 'user_name', 'Bob', 0, '/forums', 'http://localhost:8080/academy');



foreach ($_COOKIE as $key=>$val)
  {
    echo $key.' is '.$val."<br>\n";
  }
 echo  $_COOKIE['user_name'];
 */
  
session_start();
//print_r($_SESSION);
// __FILE__ get the full path of the file including the file name;
// dirname get the full path of the urrent file not including the file name;
$base_url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";

$publicPath=$base_url."public/assets/";
?>
    <head>
<title>Web Academy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="<?php echo $publicPath."/img/fav-icon.png"?>" />
<meta name="Keywords" content="HTML,CSS,JavaScript,SQL,PHP,jQuery,Bootstrap,Web development">
<meta name="Description" content="Courses in HTML, CSS, JavaScript, SQL, PHP, and XML.">
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet"type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo  $publicPath.'css/bootstrap.min.css' ?>">
<script type="text/javascript" src="<?php echo  $publicPath.'js/jquery-1.11.3.min.js' ?>" ></script>
<script type="text/javascript" src="<?php echo  $publicPath.'js/bootstrap.min.js' ?>" ></script>
    </head>
    <body>
  <div class="container-fluid">
  <br/>
<!--Header Section-->
<div class="row">
<div class="col-md-12"><?php require_once(dirname(__FILE__)."/header.php"); ?></div>
</div>
<!--Body Section-->
<div class="row">
<div class="col-md-2"><?php require_once(dirname(__FILE__)."/side.php"); ?></div>
<div class="col-md-10"><?php
//prepare the success message to be displayed if exists in the session
if(isset($_SESSION['success']))
{
  echo '<div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert! </strong>'. $_SESSION['success'] .'</div>';
        unset($_SESSION['success']);
}
//prepare the error message to be displayed if exists in the session
if(isset($_SESSION['error']))
{
  echo '<div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert! </strong>'. $_SESSION['error'] .'</div>';
        unset($_SESSION['error']);
}

//prepare the route variable in the url
$route="/home.php";
if(isset($_GET['route']))
{
   $route=$_GET['route'].".php";
}
//require_once(dirname(__FILE__).$route); 
require_once($_SERVER['DOCUMENT_ROOT']."/academy/".$route); 

?></div>
</div>
<!--Footer Section-->
<div class="row">
<div class="col-md-12"><?php require_once(dirname(__FILE__)."/footer.php"); ?></div>
</div>

</div>

 


    </body>
</html>
