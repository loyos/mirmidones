<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
//    $human = intval($_POST['human']);
    $from = 'mirmidonesgroup.com';
    $to = 'rdiaz@mirmidonesgroup.com';
    $subject = "Message from Contact Form ";

    $body ="From: $name\n E-Mail: $email\n Message:\n $message";
    // Check if name has been entered
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_POST['message']) {
        $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
//    if ($human !== 5) {
//        $errHuman = 'Your anti-spam is incorrect';
//    }
// If there are no errors, send the email
    if (!isset($errName) && !isset($errEmail) && !isset($errMessage) /*&& !isset($errHuman)*/) {
        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Thank You! We will be in touch.</div>';
        } else {
            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
    <title>Bootstrap Contact Form With PHP Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
<!--        <div class="col-sm-12 col-md-12 col-lg-12">-->
            <img src="images/header.png" width="100%" height="auto" style="min-height: 100px;">
<!--        </div>-->
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" style="text-align: center; position: relative; top: -95px;">
            <img src="images/logo.png" width="400px" height="auto" style="min-height: 50px;">
        </div>
    </div>
</div>
<div class="container" style = "position: relative; top: -90px;">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center test">
            <h3 style="color: #048bbf; padding-top: 20px;"> Opportunistic Investment Group </h3>
            <h3 >Based and focused on Latin America</h3>
            <h3 style=" padding: 20px; padding-top: 50px;">CONTACT US </h3>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-5 col-md-5 col-sm-7 col-sm-offset-3 col-md-offset-4 col-xs-6 col-xs-offset-3 ">
<!--            <h1 class="page-header text-center">Contact Form Example</h1>-->
            <form class="form-horizontal" role="form" method="post" action="index.php">
                <div class="form-group">
<!--                    <label for="name" class="col-sm-2 control-label">Name</label>-->
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php if(isset($_POST['name'])){  echo htmlspecialchars($_POST['name']); }?>">
                        <?php if(isset($errName)){ echo "<p class='text-danger'>$errName</p>"; }?>
                    </div>
                </div>
                <div class="form-group">
<!--                    <label for="email" class="col-sm-2 control-label">Email</label>-->
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php if(isset($_POST['email'])){ echo htmlspecialchars($_POST['email']); }?>">
                        <?php if(isset($errEmail)){ echo "<p class='text-danger'> $errEmail</p>"; }?>
                    </div>
                </div>
                <div class="form-group">
<!--                    <label for="message" class="col-sm-2 control-label">Message</label>-->
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="message" placeholder="subject"><?php if(isset($_POST['message'])){ echo htmlspecialchars($_POST['message']); }?></textarea>
                        <?php if(isset($errMessage)){ echo "<p class='text-danger'>$errMessage</p>"; }?>
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">-->
<!--                        --><?php //if(isset($errHuman)){  echo "<p class='text-danger'>$errHuman</p>"; }?>
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <div class="col-sm-10 ">
                        <input id="submit" name="submit" type="submit" value="SEND" class="button">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-0">
                        <?php if(isset($result)){ echo $result; } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>