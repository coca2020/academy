


<style type="text/css">

.zoom_img img{
  position: absolute;
  /*
-moz-transition:-moz-transform 0.5s ease-in; 
-webkit-transition:-webkit-transform 0.5s ease-in; 
-o-transition:-o-transform 0.5s ease-in;
*/
  transition:transform 0.5s ease-in;
}
.zoom_img img:hover{
    position: absolute;

  /*
    -moz-transform: scale(5) rotate(360deg);
    -webkit-transform: scale(5) rotate(360deg);
    -o-transform: scale(5) rotate(360deg);
    -ms-transform: scale(5) rotate(360deg);
*/
 top:200px;

    transform: scale(5) translateX(-100px) translateY(-50%) rotate(360deg) ;
}



</style>


<?php
require_once('../resources/Users.php');
   $UsersModel=new Users;
   $usersData=$UsersModel->showAllUsers();

   if(isset($_GET['id']) && $_GET['route_action']=='delete' && $_GET['id']!=1)
   {

   $error=$UsersModel->deleteUser($_GET['id']);
   $url= $base_url.'?route=manageusers';
///if no error delete the user   
   if(!$error)
   {
   $_SESSION['success']="User Deleted";
   header('Location: ' . $url);
   }
///if error throw the error
   else if($error)
   {
   $_SESSION['error']="Error".$error;
   header('Location: ' . $url);
   }

   }
//prepare to prevent delete admin account
if(isset($_GET['id']) && $_GET['route_action']=='delete' && $_GET['id']==1)
   {
   $url= $base_url.'?route=manageusers';
   $_SESSION['error']="Cant Delete admin account";
   header('Location: ' . $url);
   
   }

?>




<div class="table-responsive">
<table class="table table-bordered table-triped">

  <thead>
<tr>
   <th class="span1">ID</th>
   <th class="span3">User Name</th>
   <th class="span2">Email</th>
   <th class="span1">Group Name</th>              
   <th class="span1">Action</th>
   <th class="col-md-4">Image</th>
</tr>
  </thead>

  <tbody>
  <?php
foreach($usersData as $item)
{
     $item=(object)$item;
    // $id=10;
  ?>

  <tr>
      <td> <?php echo $item->id ?></td>
      <td> <?php echo $item->user_name?> </td>
      <td> <?php echo $item->email?> </td>
      <td> <?php echo $item->group_name?> </td>
      <td>
      <a href="<?php echo $base_url.'?route=manageusers&route_action=delete&id='.$item->id; ?>" class="btn btn-danger">Delete</a>      
      <a href="<?php echo $base_url.'?route=edituser&id='.$item->id; ?>" class="btn btn-info">Edit</a>
      </td>      
      <td class="zoom_img">
<img  src="<?php echo $bublicPath."img/users/".$item->img_filename ; ?>" width=50 height=50 />
      </td>      
  </tr>
<?php  } ?>
  </tbody>

</table>
</div>


