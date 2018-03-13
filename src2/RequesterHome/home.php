<?php
    include('../LoginScreen/logindb.php');

    if(isset($_POST['new_form_btn']))
    {
        header('Location: ../RequesterForm/form.php');
    }

    if(isset($_POST['old_form_btn'])) {
        header('Location: ../RequesterRepo/allrequest.php');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Home Screen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:rgb(201,95,19);">
<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:0px;">
    <div class="container"><a class="navbar-brand" href="#">Royal Holloway</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="home.php" style="color:rgb(255,255,255);">Home </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<h1><strong><span>Welcome <?php print_r($_SESSION['login_user']) ?></span></strong></h1>
<selection>
    <div class="container">
        <div class="photo-card">
            <div class="photo-background"
                 style="background-image:url(&quot;assets/img/product-aeon-feature.jpg&quot;);"></div>
            <div class="photo-details">
                <h2><?php echo $info['firstname'] ?> <?php echo $info['surname'] ?></h2>
                <p>Department: <?php echo $info['department'] ?></p>
                <p>Absence: <?php echo $info['absence'] ?></p>
                <p>Reason for absence: <?php echo $info['reason'] ?></p>
                <p>Contact: 0<?php echo $info['contact'] ?></p>
                <h1>Request has been <?php echo $decision ?> </h1>
                <h1>Please click below to view other forms</h1>
                <div class="photo-tags">
                    <ul>
                        <li><a href="requests.php">Latest Requests</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <div>
        <div class="row">
            <div class="home">
                <form class="home-form" method="POST" actions="home.php">
                    <div class="home-buttonWrapper">
                        <button type="submit" class="btn btn-newForm" name="new_form_btn" id="new_form_btn">New Form</button>
                        <button type="submit" class="btn btn-oldForm" name="old_form_btn" id="old_form_btn">View Old Forms</button>
                    </div>

                </form>
            </div>
        </div>
</selection>
<div class="home">
    <form class="home-form" method="POST" actions="home.php">
        <div class="home-buttonWrapper">
            <button type="submit" class="btn btn-newForm" name="new_form_btn" id="new_form_btn">New Form</button>
            <button type="submit" class="btn btn-oldForm" name="old_form_btn" id="old_form_btn">View Old Forms</button>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>