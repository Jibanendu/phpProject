<?php
include('../AuthorizerForm/authorizerdb.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


$userId = '';
if( isset( $_GET['id'])) {
    $userId = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorizer form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-color:rgb(201,95,19);">
<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:0px;">
    <div class="container"><a class="navbar-brand" href="#">Royal Holloway</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="../AuthorizerHome/home.php" style="color:rgb(255,255,255);">Home </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../AuthorizerRequest/requests.php" style="color:rgb(255,255,255);">Latest requests </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(255,255,255);">Form </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<div>
    <h2 class="text-center text-dark" style="height:48px;"><strong><span style="text-decoration: underline;">Leave of absence form</span></strong></h2>
</div>
<?

$db = mysqli_connect('localhost', 'root', '', 'Userlogin', 8889);
$sql = "SELECT * FROM Authorizer_form WHERE status in('Denied','Authorized') AND id = '$userId'";
$query = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="container">
        <form action="../AuthorizerRequest/submitStatus.php" method="POST" >
            <div class="form-row">
                <div class="col-md-6">
                    <div id="successfail"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6" id="userId" hidden>
                    <input class="form-control" type="text" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="col-md-6" id="message">
                    <fieldset></fieldset>
                    <div class="form-group has-feedback">
                        <label for="department" style="font-size:20;"><strong>Department</strong></label>
                        <input class="form-control" type="text" name="department" value="<?php echo $row['department'] ?>" readonly="" placeholder="Department" id="department" tabindex="-1">
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group has-feedback">
                                <label for="forename"><strong>Forename</strong> </label>
                                <input class="form-control" type="email" name="forename" value="<?php echo $row['firstname'] ?>" readonly="" placeholder="Forename" id="forneame">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group has-feedback">
                                <label for="surname"><strong>Surname</strong> </label>
                                <input class="form-control" type="email" name="surname" value="<?php echo $row['surname'] ?>" readonly="" placeholder="Surname" id="surname">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="absence"><strong>Absence</strong> </label>
                                <input class="form-control" type="text" name="absence" value="<?php echo $row['absence'] ?>" readonly="" placeholder="Absence">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason"><strong>Reason</strong> </label>
                        <textarea class="form-control" rows="5" name="reason" readonly="" placeholder="Reason" id="reason"><?php echo $row['reason'] ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="com-date"><strong>Start date</strong></label>
                                <input class="form-control" type="date" name="com-date" value="<?php echo $row['start_date'] ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ret-date"><strong>End date</strong></label>
                                <input class="form-control" type="date" name="ret-date" value="<?php echo $row['return_date'] ?>" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contact"><strong>Contact</strong> </label>
                                <input class="form-control" type="tel" name="contact" value="<?php echo $row['contact'] ?>" readonly="" placeholder="Contact">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emer-contact"><strong>Emergency Contact</strong></label>
                                <input class="form-control" type="tel" name="emer-contact" value="<?php echo $row['emergency_contact'] ?>" readonly="" placeholder="Emergency Contact">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="postcode"><strong>Postcode</strong> </label>
                                <input class="form-control" type="tel" name="postcode" value="<?php echo $row['postcode'] ?>" readonly="" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="file"><strong>File</strong> </label>
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="padding:0;">
                        <div class="col">
                            <label class="col-form-label" for="calltime"><strong>Authorize/Deny Request:</strong></label>
                            <section id="first" class="section">
                                <div class="container">
                                    <input type="radio" name="decision" id="decision" <?php if (isset($decision) && $decision=="Authorized") echo "checked";?> value="Authorized">
                                    <label for="decision"><span class="radio">Authorize</span></label>
                                </div>
                                <div class="container">
                                    <input type="radio" name="decision" id="decision" <?php if (isset($decision) && $decision=="Denied") echo "checked";?> value="Denied">
                                    <label for="decision"><span class="radio">Deny</span></label>
                                </div>
                            </section>
                        </div>
                        <div class="col">
                            <label class="col-form-label" for="explanation"><strong>Comment:</strong> </label>
                            <textarea class="form-control" rows="5" name="explanation" placeholder="Reason" id="explanation"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-4"><button class="btn btn-primary btn-block" type="submit" name="form_button" id="form_button">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
            </div>
        </form>
    </div>
    <?php
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>