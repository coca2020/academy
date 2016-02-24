<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
$base_url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
//----redirect to home if not admin auhtorized
if((isset($_SESSION['user_data']['group_name'])) && $_SESSION['user_data']['group_name']!='admin' )
{
    $url=str_replace('/admin', '', $base_url).'?route=home';
    $_SESSION['error']="Sorry, you are not authorized to aces this page";
    header('Location:'.$url);  
            die();
}
//redirect to home with message of no logged in 
if(!isset($_SESSION['user_data']))
{
    $url=str_replace('/admin', '', $base_url).'?route=home';
    $_SESSION['error']="Please login first";
    header('Location:'.$url);  
            die();
}
$bublicPath=str_replace('/admin', '', $base_url)."public/assets/";//-----
?>
    <head>
<title>Web Academy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="HTML,CSS,JavaScript,SQL,PHP,jQuery,Bootstrap,Web development">
<meta name="Description" content="Courses in HTML, CSS, JavaScript, SQL, PHP, and XML.">
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet"type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo  $bublicPath.'css/bootstrap.min.css' ?>">
<script type="text/javascript" src="<?php echo  $bublicPath.'js/jquery-1.11.3.min.js' ?>" ></script>
<script type="text/javascript" src="<?php echo  $bublicPath.'js/bootstrap.min.js' ?>" ></script>
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
<div class="col-md-10">
<?php
//prepare the route variable in the url
$route="/dashboard.php";
if(isset($_GET['route']))
{
   $route="/".$_GET['route'].".php";
}
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

require_once(dirname(__FILE__).$route); 
?>
</div>
</div>
<!--Footer Section-->
<div class="row">
<div class="col-md-12"><?php require_once(dirname(__FILE__)."/footer.php"); ?></div>
</div>

</div>

 


    </body>
</html>
