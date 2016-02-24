
 <!-- main container for accordion-->   
<div class="accordion">                        
<!--start pannel item-->
                <div class="panel panel-default">
<!--start pannel header-->
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#users">
                            <span class="glyphicon  glyphicon-globe">
                            </span> Admin</a>
                        </h4>
                    </div>
<!--end pannel header-->
<!--start pannel details-->
                    <div id="users" class="panel-collapse collapse in">
                        <div class="panel-body">

  <a href="<?php echo $base_url.'?route=manageusers'; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-pencil"></span> Users <span class="badge">42</span></a>

  <a href="<?php echo $base_url.'?route=aboutus'; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-pencil"></span> About Us </a>

 <a href="<?php echo $base_url.'?route=categories'; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-pencil"></span> Courses Categories </a>
  
  <a href="<?php echo $base_url.'?route=addcourses'; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-pencil"></span> Add Courses </a>
  

  <a href="<?php echo $base_url.'?route=allcourses'; ?>" class="list-group-item">
  <span class="glyphicon glyphicon-pencil"></span> All Courses </a>

                        </div>
                    </div>
<!--end pannel details-->
                </div>










</div>


