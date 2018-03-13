<?php
include('formdb.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>

<?php
if(isset($_POST['form_button'])){
    $to = "jiban.rath03@gmail.com"; // this is your Email address
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com";
    mail($to,$subject,$txt,$headers);
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:rgb(201,95,19);">
<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:0px;">
    <div class="container"><a class="navbar-brand" href="#">Royal Holloway</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="../RequesterHome/home.php" style="color:rgb(255,255,255);">Home </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(255,255,255);">Form </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<div>
    <h2 class="text-center text-dark" style="height:48px;"><strong><span style="text-decoration: underline;">Leave of absence request</span></strong></h2>
</div>
<div class="container">
    <form method="POST" action="form.php" id="requesterForm">
        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6" id="message">
                <fieldset></fieldset>
                <div class="form-group has-feedback">
                    <label for="department" style="font-size:20;"><strong>Department</strong></label>
                    <input class="form-control" type="text" required="" name="department" placeholder="Department" id="department" tabindex="-1">
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group has-feedback">
                            <label for="forname"><strong>Forename</strong> </label>
                            <input class="form-control" type="text" required="" value="<?php print_r($_SESSION['login_user']) ?>" name="forename" placeholder="Forename" id="forname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group has-feedback">
                            <label for="surname"><strong>Surname</strong> </label>
                            <input class="form-control" type="text" required="" value="<?php print_r($_SESSION['lastname']) ?>" name="surname" placeholder="Surname" id="surname">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="absence"><strong>Absence</strong> </label>
                            <select class="form-control" required="" name="absence" id="absence">
                                <option value="Training">Training</option>
                                <option value="Conference" selected="">Conference</option>
                                <option value="Sabbatical">Sabbatical</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Holiday">Holiday</option>
                                <option value="Other">Other</option>
                                <option value="Sickness">Sickness</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reason"><strong>Reason</strong> </label>
                    <textarea class="form-control" rows="5" required="" name="reason" placeholder="Reason" id="reason"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date"><strong>Start date</strong></label>
                            <input class="form-control" type="date" required="" name="start" id="start">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ret-date"><strong>End date</strong></label>
                            <input class="form-control" type="date" required="" name="return" id="return">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="contact"><strong>Contact</strong> </label>
                            <input class="form-control" type="tel" required="" name="contact" id="contact" data-validation="required length number" data-validation-length="min10 max10" placeholder="Contact">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="emer-contact"><strong>Emergency Contact</strong></label>
                            <input class="form-control" type="tel" required="" name="emergency" id="emergency" placeholder="Emergency Contact">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="postcode"><strong>Postcode</strong> </label>
                            <input class="form-control" type="tel" required="" name="postcode" id="postcode" placeholder="Postcode">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="file"><strong>File</strong> </label>
                            <input type="file">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-2">
                <button class="btn btn-success btn-block" type ="button" name="save_button" id="save_button">Save <i class="fa fa-save"></i></button>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary btn-block" type="submit" name="form_button" id="form_button">Submit <i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../Script/jquery.form-validator.min.js"></script>
<script>
    $.validate({
        lang: 'en'
    });
    document.querySelector('#save_button').addEventListener('click', function(e) {
        var theForm = document.querySelector('form');
        var theData = new FormData(theForm);
        theData.append('save_button', 'some value');
        fetch('form.php', {
            method: 'POST',
            body: theData,
        }).then(r => r.text()).then(result =>
        console.log(result)
    );
    })

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
</body>
<style>
    .form-error{
        color: #bf0030;
    }
</style>

</html>