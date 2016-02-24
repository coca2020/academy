

<script type="text/javascript">

$(document).ready(function(){
  //--------------get target course ---------------------
    $("#course_name").change(function() {
        $.ajax({
              url: '<?php echo $base_url."ajax.php"; ?>',
              type: 'POST',
              data: {course_name:$('#course_name').val()}/*form.serialize()*/,
              //handle success             
              success: function(data){
              // console.log(data); 
              data = JSON.parse(data);
              //  console.log(data); 
               //alert(JSON.stringify(data));
              $("#course_content").html(data[0]['course_content']);
              }
         ,
              //handle errors
              error: function()
                            {
             alert("error");
                            }
          });
   });
//JSON.stringify turns a Javascript object into JSON text and stores that JSON text in a string.

//JSON.parse turns a string of JSON text into a Javascript object.

    //******get course of selected category------------**********************----------
    $("#cat_name").change(function() {
        $.ajax({
              url: '<?php echo $base_url."ajax.php"; ?>',
              type: 'POST',
              data: {cat_name:$('#cat_name').val()},
              //handle success             
              success: function(data){
                console.log(data);
                               //alert(JSON.stringify(data));
               data = JSON.parse(data);
               console.log(data[1]);
               $('#course_name').empty();
               //alert(JSON.stringify(data));
              $.each(data, function(key, val){
                //console.log(key);
              var option="<option value="+ val.course_name+">"+ val.course_name+"</option>";
               $('#course_name').append(option);
                    });
              $('#course_name').prepend("<option>Select Course</option>");
              }
         ,
              //handle errors
              error: function()
                            {
                   alert("error");
                            }
        });
   });

  });
</script>

<?php
   require_once('resources/courses.php');
    $coursesModel=new Courses;
    $catsData=$coursesModel->fnGetCats();
   // $coursesList=$coursesModel->fnGetCoursesList();


  
 

?>

<div class="form-horizontal">



  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Category:</label>    
    <div class="col-sm-10"> 
   <select class="form-control" name="cat_name" id="cat_name" style="width:150px">
       <option id="" value="">Select Category</option>
            <?php foreach($catsData as $cat) { ?>}
            <option id="" value="<?php echo $cat->cat_name ?>"><?php echo $cat->cat_name ?></option>
            <?php  } ?>
    </select>  
    </div>
    </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="course_name">Courses:</label>    
    <div class="col-sm-10"> 
   <select class="form-control" name="course_name" id="course_name" style="width:150px">
    </select>  
    </div>
    </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="course_content">Course Content:</label>
    <div class="col-sm-10" id="course_content"> 
      
    </div> 
  </div>


</div>