<?php
   require_once('../resources/aboutus.php');
    $aboutUsModel=new aboutUs;
    $aboutUsData=$aboutUsModel->fnGetAboutUs()[0];

if(isset($_POST['submit']))
  {
   $title=$_POST['title'];
   $content=trim($_POST['content']);
   $error=$aboutUsModel->fnUpdateAboutUs($title, $content);
   if($error)
   {
    $url=$base_url.'?route=aboutus';
    $_SESSION['error']=$error;
    header('Location:'.$url);
   }
   else
   {
   $url=$base_url.'?route=aboutus';
    $_SESSION['success']="data updated";
    header('Location:'.$url);
       }

  }
?>

<form class="form-horizontal" role="form" name="myForm" id="myForm" 
action="<?php echo $base_url.'?route=aboutus'; ?>" method="post">

 <div class="form-group">
    <label class="control-label col-sm-2" for="title">Title:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="title" value="<?php echo $aboutUsData['title'];?>" name='title' placeholder="Enter title">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Content">Content:</label>
    <div class="col-sm-10"> 
      <textarea type="Content" class="form-control" rows=15 id="Content" name="content"><?php echo $aboutUsData['content'];?></textarea>
    </div> 
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit fg</button>
    </div>
  </div>
</form>