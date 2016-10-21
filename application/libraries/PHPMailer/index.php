<?php
$response = '';
if(isset($_POST['submit'])){
    include './PHPMailerAutoload.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    if(!empty($email) and !empty($name)){
    
$mail = new PHPMailer();

$body ='<div style="width: 400px; border: 2px solid #ddd; padding: 10px;">
                <a href="http://webrocom.net/" style="text-align: center; display: block; text-transform: uppercase; font-size: 25px; background: #33ccff; color: #fff">webrocom</a>
                <p style="background: #efe9e9; font-size: 15px; padding: 4px;">Your Name:<span style="font-size: 15px; padding: 4px; font-weight: bold">'.$name.'</span></p>
                <p style="background: #efe9e9; font-size: 15px; padding: 4px;">Your Email:<span style="font-size: 15px; padding: 4px; font-weight: bold">'.$email.'</span></p>
                <p style="background: #efe9e9; font-size: 15px; padding: 4px;">Your Message:<span style="font-size: 15px; padding: 4px; font-weight: bold">'.$msg.'</span></p>
            </div>';

$mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "";  // GMAIL username
$mail->Password   = "";            // GMAIL password

$mail->SetFrom('webrocom@gmail.com', 'Vikram Parihar');

$mail->AddReplyTo("pariharvikram1989@gmail.com","Vikram Parihar");

$mail->Subject    = "PHPMailer Test by Gmail tuts on webrocom";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "pariharvikram1989@gmail.com";
$mail->AddAddress($address, "John Doe");



if(!$mail->Send()) {
  $response =  "Mailer Error: " . $mail->ErrorInfo;
} else {
  $response = "<p class='alert alert-success'>Your email has been sent</p>";
}
    }
    else{
    $response = "<p class='alert alert-danger'>invalid argument</p>";
    }
}


?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Get value form all or selected text boxes using jquery | webrocom</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        
        <!-- Latest compiled and minified Jquery -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <blockquote style="background: #333; color: #fff">
                <h2 style="text-transform: uppercase">Sending mail using php mailer</h2>
                <small><a href="http://webrocom.net" target="_blank">webrocom.net</a></small>
            <hr/>
            <!--social block-->
                    <style>
                        #response{display: none}
                        div #fb, div #gp, div #tw{display: inline-block;}
                        #fb{width: 180px;}
                        #gp{width:  100px;}
                        #tw{width: 180px;}
                    </style>
                    <div id="fb">
                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fwebrocom.learn&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=1464599523806855" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
                    </div>
                    <div id="tw">
                        <a href="https://twitter.com/webrocom" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @webrocom</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                    <div id="gp">
                        <!-- Place this tag in your head or just before your close body tag. -->
                       <script src="https://apis.google.com/js/platform.js" async defer></script>
                       <!-- Place this tag where you want the +1 button to render. -->
                       <div class="g-plusone" data-href="https://plus.google.com/+WebrocomNetwebrocom/about"></div>
                   </div>
                    <!--finish social block-->
                    
                    <div class="row clear-fix">
                        
                        <div class="col-md-6">
                            <form method="POST" action="">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                                <label>Message</label>
                                <textarea name="msg" class="form-control"></textarea>
                                <br>
                                <input type="submit" name="submit" class="btn btn-block btn-info" value="send">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <?php if(isset($response) and !empty($response)){echo $response;} ?>
                        </div>
                        
                    </div>
                    </blockquote>
            
        </div>
    </body>
</html>