<?php
require_once('resources/PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['submit']))
{
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.efts-online.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@efts-online.com';                 // SMTP username
$mail->Password = 'info2016';
$mail->Port = 26;               
//$mail->SMTPSecure = 'tls';  // Enable encryption, 'ssl' also accepted
//-------------------------------------------------------------------------
$mail->From =$_POST['email'];
$mail->FromName ="Future Academy";
$mail->addAddress("moh.shalan79@hotmail.com", 'mohamed shalan');     // Add a recipient/ Name is optional//
$mail->addReplyTo("info@df3nalk.com", 'Information');
//$mail->addCC('info@dev-layer.com');
//$mail->addBCC('moh.shalan@hotmail.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $_POST['name'];
$mail->Body    = $_POST['message'];//'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    $error='Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
    $url=$base_url.'?route=contactus';
    $_SESSION['success']="Message has been sent";
    header('Location:'.$url);
}
   

}
?>
<div class="col-md-8">

<form class="form-horizontal" role="form" action="<?php echo $base_url.'?route=contactus'?>" method="post">

    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Name</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="name" required name="name" placeholder="First & Last Name" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-2 control-label">Email</label>
        <div class="col-md-10">
            <input type="email" class="form-control" id="email" name="email" required placeholder="example@domain.com" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-md-2 control-label">Message</label>
        <div class="col-md-10">
            <textarea class="form-control" rows="4"  required name="message"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </div>

</form>
</div>