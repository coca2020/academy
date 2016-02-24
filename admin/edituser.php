<?php
   require_once('../resources/Users.php');
   $id;
   $UsersModel=new Users;
   //get the first array from array of objects that include the data of target
   $id=$_GET['id'];
   $usersData=$UsersModel->getUserData($id)[0];
  //update the curent user data
   if(isset($_POST['submit']))
   {
    $id=$_POST['id'];
    $group_name=$_POST['group_name'];
    $error=$UsersModel->updateUser($group_name,$id);
    $url= $base_url.'?route=edituser&id='.$id;
   if(!$error)
   {
   $_SESSION['success']="User Updated";
   header('Location: ' . $url);
   }
///if error throw the error
   else if($error)
   {
   $_SESSION['error']="Error".$error;
   header('Location: ' . $url);
   }
   }

?>


<form class="form-horizontal" role="form" name="myForm" id="myForm" 
action="<?php echo $base_url.'?route=edituser&id='.$id; ?>" method="post">

  <input type="hidden" value="<?php echo $id?>" name="id"/>

 <div class="form-group">
    <label class="control-label col-sm-2" for="user_name">User Name:</label>
    <div class="col-sm-6"> 
<input type="text" class="form-control" id="user_name" disabled value="<?php echo $usersData->user_name?>" name='user_name' placeholder="Enter User name" required>
    </div>
  </div>





  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
  <input type="email" class="form-control" id="email" disabled value="<?php echo $usersData->email?>" name="email" placeholder="Enter email" required>
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2 " for="pwd">Group</label>    
    <div class="col-sm-6">
   <select class="form-control" name="group_name" id="group_name" style="width:150px">
   <option id="" value="admin" 
   <?php if($usersData->group_name=='admin'){?> selected="selected" <?php } ?> >Admin
   </option>
   <option id="" value="user" 
   <?php if($usersData->group_name=='user'){?> selected="selected" <?php }?> >User
   </option>           
    </select>  
    </div>
    </div>

 

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary"  onclick="fn_validate();">Update</button>
    </div>
  </div>
</form>
