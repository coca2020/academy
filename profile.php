<style type="text/css">
 .img-responsive
 {
  border-radius: 10px;
  border:3px solid lightblue;
  box-shadow: 0px 0px 10px blue;
  width: 250px;
  height: 250px;
  margin-left:100px;
 } 

</style>

<?php
  // $base_url="http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/";
   $url=$base_url.'?route=profile';
   require_once('resources/Users.php');
   $id;
   $UsersModel=new Users;
   //get the user data and display it
  if (isset($_SESSION['user_data']['id'])) {
    $id=$_SESSION['user_data']['id'];
    $usersData=$UsersModel->getUserData($id)[0];
  }
  else//redirect to home page if not logged in
  {
      $_SESSION['error']="Sorry, you are not authorized to access this page";
      header('Location:'.$url);  
      die();
  }
//update the curent user data
  
 if(isset($_POST['submit']))
   {
    $id=$_SESSION['user_data']['id'];
    $userEmail=$_POST['email'];
    $error=$UsersModel->updateUserEmail($userEmail,$id);
   if(!$error)
   {
   $_SESSION['success']="User Updated";
   header('Location: ' . $url);
   }
  //if error throw the error
   else if($error)
   {
   $_SESSION['error']="Error".$error;
   header('Location: ' . $url);
   }
   }
?>
<!--html form for showing user data and upfaing its email-->
<form class="form-horizontal" role="form" name="myForm" id="myForm" 
action="<?php echo $base_url.'?route=profile'; ?>" method="post">

 <div class="form-group">
    <label class="control-label col-sm-2" for="user_name">User Name:</label>
    <div class="col-sm-6"> 
<input type="text" class="form-control" id="user_name" disabled value="<?php echo $usersData->user_name?>" name='user_name' placeholder="Enter User name" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-6">
  <input type="email" class="form-control" id="email" value="<?php echo $usersData->email?>" name="email" placeholder="Enter email" required>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary"  onclick="fn_validate();">Update</button>
    </div>
  </div>
</form>
<!--html form for uploading user image-->
<form class="form-horizontal" role="form" enctype="multipart/form-data" 
action="<?php echo $base_url.'?route=profile'; ?>" method="post">

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Imgage File:</label>
    <div class="col-sm-6">
     <input type="file" name="image" />
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit_image" class="btn btn-default">Submit</button>
    </div>
  </div>

</form>

<?php 
if($usersData->img_filename=='')
{
?>
 '<img class="img-responsive" src="<?php echo $publicPath."img/users/none.jpg"; ?>"  />
<?php
}
?>

<?php
if($usersData->img_filename!='')
{
?>
<img class="img-responsive" src="<?php echo $publicPath."img/users/".$usersData->img_filename ; ?>"  />
<?php
}
?>


<?php
//print_r($_FILES);
   if(isset($_FILES['image'])){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png","gif");
      //check if there is file selected or not
      if ($_FILES['image']['size'] == 0)
      {
      $errors[]="Sorry, Empty file selected";
      }
      else
      {
      //***--*****
      // Check if file already exists
      $target_dir = "public/img/users/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      if (file_exists($target_file)) {
      $errors[]="Sorry, file already exists.";
      }
      // Check if image file is a actual image or none image
     // $checkImage=mime_content_type($file_tmp);
      $result = new finfo();
      $checkImage= $result->file($file_tmp, FILEINFO_MIME_TYPE);
      $imageTypes=['image/gif','image/jpg','image/png','image/jpeg'];
      if(in_array($checkImage,$imageTypes)=== false){
       $errors[]="Sorry, Not actual image";
      }
      //limit extensions
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      //limit file size ...size in byte
      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }
      //***--*****
      }
     //upload imae if no errors
      if(empty($errors)){
        // move_uploaded_file($file_tmp,"public/img/users/".$file_name);
        move_uploaded_file($file_tmp,"public/assets/img/users/".$_SESSION['user_data']['id'].".".$file_ext);
        $id=$_SESSION['user_data']['id'];
        $file_name=$_SESSION['user_data']['id'].".".$file_ext;
        $UsersModel->updateUserImage($file_name,$id);
        $message="The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
       // echo $message;
        echo '<div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert! </strong>'. $message .'</div>';
     ?>
          <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
    <?php
      }
      if(!empty($errors))
      {             
         echo '<div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Alert! </strong>'. implode(" ,",$errors) .'</div>';
      }


   }


?>