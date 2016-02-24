<?php


require_once('resources/aboutUs.php');

       $AboutUsModel=new aboutUs;
       $about_us_data=$AboutUsModel->fnGetAboutUs()[0];

//print_r($about_us_data);
       	                   //      'title'=>$about_us_data['title'],
        	                 //    'content'=>$about_us_data['content']]);
?>


  

  <div class="well col-md-8"> <center> <strong> <?php echo $about_us_data['title'];?> </strong></center> </div>

  <div class="well well-lg col-md-8"><?php echo $about_us_data['content'];?></div>
