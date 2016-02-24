<?php
   require_once('../resources/courses.php');
    $coursesModel=new Courses;
    $coursesData=$coursesModel->fnGetCats();
//-add new cat
if(isset($_POST['submit']))
  {
   $cat_name=$_POST['cat_name'];
   $error=$coursesModel->fnAddCat($cat_name);
   if($error)
   {
    $url=$base_url.'?route=categories';
    $_SESSION['error']=$error;
    header('Location:'.$url);
   }
   else
   {
   $url=$base_url.'?route=categories';
    $_SESSION['success']="Category updated";
    header('Location:'.$url);
       }
  }

//delete cat
   if(isset($_GET['id']) && $_GET['route_action']=='delete')
   {
   $error=$coursesModel->deleteCat($_GET['id']);
   $url= $base_url.'?route=categories';
///if no error delete the user   
   if(!$error)
   {
   $_SESSION['success']="Cetgory Deleted";
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
action="<?php echo $base_url.'?route=categories'; ?>" method="post">

 <div class="form-group">
    <label class="control-label col-sm-2" for="cat_name">Category name:</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="cat_name"  name='cat_name' placeholder="Enter category">
    </div>
  </div>


  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>





<div class="table-responsive col-sm-8">
<table class="table table-bordered table-triped ">

  <thead>
<tr>
   <th class="span3">Category Name</th>
   <th class="span2">Action</th>
</tr>
  </thead>

  <tbody>
  <?php
foreach($coursesData as $item)
{
  ?>

  <tr>
      <td> <?php echo $item->cat_name?> </td>
      <td>
      <a href="<?php echo $base_url.'?route=categories&route_action=delete&id='.$item->id; ?>" class="btn btn-danger">Delete</a>      
      </td>          
  </tr>
<?php  } ?>
  </tbody>

</table>
</div>