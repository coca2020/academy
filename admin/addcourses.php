
<script type="text/javascript">

  $(document).ready(function(){
    $('#myForm').submit(function(e){
        var form = $(this);
        $.ajax({
             // url: 'http://localhost:8080/academy/admin/courses.php',
              url: '<?php echo $base_url."addcourses.php"; ?>',
              type: 'POST',
              data: form.serialize(),
              success: function(response){
                alert("done");
              },
              error: function(response){
                alert("error");
              }
        });
        e.preventDefault();
    });
  });

</script>

<?php

   require_once('../resources/courses.php');
    $coursesModel=new Courses;
    $catsData=$coursesModel->fnGetCats();
if(isset($_POST['course_name']))
  {
   $cat_name=$_POST['cat_name'];
   $course_name=$_POST['course_name'];
   $course_content=$_POST['course_content'];
   $error=$coursesModel->fnAddCourse($cat_name,$course_name,$course_content);
   if($error)
   {
    $url=$base_url.'?route=courses';
    $_SESSION['error']=$error;
    //header('Location:'.$url);
   }
   else
   {
   $url=$base_url.'?route=courses';
    $_SESSION['success']="Course Added";
    //header('Location:'.$url);
       }

  }
?>

<form class="form-horizontal" role="form" name="myForm" id="myForm" 
action="<?php echo $base_url.'?route=courses'; ?>" method="post">



  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Sub Category:</label>    
    <div class="col-sm-10"> 
   <select class="form-control" name="cat_name" id="cat_name" style="width:150px">
               <option id="" value="">select Category</option>

            <?php foreach($catsData as $cat) { ?>}
            <option id="" value="<?php echo $cat->cat_name ?>"><?php echo $cat->cat_name ?></option>
            <?php  } ?>
    </select>  
    </div>
    </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="course_name">Course name:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="course_name"  name='course_name' placeholder="Enter course name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="course_content">Course Content:</label>
    <div class="col-sm-10"> 
      <textarea type="course_content" class="form-control" rows=15 id="course_content" name="course_content"></textarea>
    </div> 
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>