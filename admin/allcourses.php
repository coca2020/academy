

<?php


   require_once('../resources/courses.php');
    $coursesModel=new Courses;

   $coursesData=$coursesModel->fnGetCourses();

   if(isset($_GET['id']) && $_GET['route_action']=='delete' && $_GET['id']!=1)
   {

   $error=$coursesModel->deleteCourse($_GET['id']);
   $url= $base_url.'?route=allcourses';
///if no error delete the user   
   if(!$error)
   {
   $_SESSION['success']="Course Deleted";
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




<div class="table-responsive">
<table class="table table-bordered table-triped">

  <thead>
<tr>
   <th class="span1">ID</th>
   <th class="span3">Course Name</th>
   <th class="span2">Course Content</th>
   <th class="span1">Category</th>              
   <th class="span1">Action</th>
</tr>
  </thead>

  <tbody>
  <?php
foreach($coursesData as $item)
{
     $item=(object)$item;
    // $id=10;
  ?>

  <tr>
      <td> <?php echo $item->id ?></td>
      <td> <?php echo $item->course_name ?> </td>
      <td> <?php echo $item->course_content ?> </td>
      <td> <?php echo $item->cat_name ?> </td>
      <td>
      <a href="<?php echo $base_url.'?route=allcourses&route_action=delete&id='.$item->id; ?>" class="btn btn-danger">Delete</a>      
      </td>            
  </tr>
<?php  } ?>
  </tbody>

</table>
</div>


