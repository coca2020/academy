<?php
/*
foreach ($_COOKIE as $key=>$val)
  {
    echo $key.' is '.$val."<br>\n";
  }
  */
require_once('resources/Users.php');

if(isset($_SESSION['user_data']))
{
    $url=$base_url.'?route=home';
    header('Location:'.$url);
}

if (isset($_POST['submit'])) {
/*
  //set user name cookie
$cookie_name = "user_name";
$cookie_value = $_POST['user_name'];
setcookie($cookie_name, $cookie_value, time() + (24*60*60), "/"); // 86400 = 1 day
//set password cookie
$cookie_name = "password";
$cookie_value = $_POST['password'];
setcookie($cookie_name, $cookie_value, time() + (24*60*60), "/"); // 86400 = 1 day
//setcookie( 'user_name', 'Bob', 0, '/forums', 'http://localhost:8080/academy');
*/

        $user_name=$_POST['user_name'];
        $password=hash("sha256", $_POST['password']);
        $UsersModel=new Users;
        $data=$UsersModel->CheckUser($user_name, $password);
//-----------------------------check if user  not exists-----------------------------------------//
if(empty($data))
{
  echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong> Wrong User name or Password.
        </div>';
}
//-----------------------------check if user exists-----------------------------------------//
else if(isset($data[0]['user_name']))
{
     $users_data= $data[0];
     if($users_data['user_name']==$_POST['user_name'] && $users_data['password']==$password)
     {
    $_SESSION['user_data']=$users_data;
    $url=$base_url.'?route=home';
    $_SESSION['success']="Welcome Back:-".$users_data['user_name'];
    header('Location:'.$url);
     }
  }
//-----------------------------check if error in data base connection-----------------------------------------//
else 
{
      echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong>'.$data.'</div>';
}



}
  

?>


<form class="form-horizontal" role="form" action="<?php echo $base_url.'?route=login'; ?>" method="post">

 <div class="form-group">
    <label class="control-label col-sm-2" for="user_name">User Name:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="user_name" name='user_name'
      value="<?php /* echo $_COOKIE['user_name']*/ ;?>" placeholder="Enter User name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="password" 
       value="<?php /*echo $_COOKIE['password'];*/ ?>" name="password" placeholder="Enter password">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>