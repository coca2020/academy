<?php
require_once('resources/Users.php');

if(isset($_SESSION['user_data']))
{
    $url=$base_url.'?route=home';
    header('Location:'.$url);
}

if (isset($_POST['submit'])) {

        $group_name="user";
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $password=hash("sha256", $_POST['password']);
        $UsersModel=new Users;
        $result=$UsersModel->RegisterUser($user_name, $email,$password,$group_name);
// display error if exists
if(isset($result['error']))
{
    echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong>'. $result['error'] .
        '</div>';
}
else
{
  //register user and login if no errors
    $user_data=$UsersModel->getUserData($result['insert_id'])[0];
    $user_data=(array) $user_data;
    $_SESSION['user_data']=$user_data;
    print_r($user_data);
    //exit();
    $_SESSION['success']="Welcome:-".$user_data['user_name'];
    $url=$base_url.'?route=home';
    header('Location:' . $url);
}

}
  

?>


<form class="form-horizontal" role="form" name="myForm" id="myForm" action="<?php echo $base_url.'?route=register'; ?>" method="post">

  

 <div class="form-group">
    <label class="control-label col-sm-2" for="user_name">User Name:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="user_name" name='user_name' placeholder="Enter User name" required>
    </div>
  </div>





  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
  </div>



  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" oninvalid="fn_validate();" title="password Must be at least 6 characters" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default"  onclick="fn_validate();">Submit</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  
function fn_validate()
{
  /*
  data=document.getElementById('password').value;
  if (data.length < 6) {
alert("dfsdf");
  }
  else
  {*/
//document.getElementById("myForm").submit();
 /* }*/
}

</script>