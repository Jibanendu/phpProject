<?php
    include('../LoginScreen/logindb.php');


    if(isset($_POST['latest_request']))
    {
        header('Location: ../AuthorizerRequest/requests.php');
    }


    if(isset($_POST['old_requester']))
    {
        header('Location: ../AuthorizerRepo/allrequests.php');
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorizer Home Page</title>
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
<div>
    <h2 class="text-center text-dark" style="height:48px;"><strong><span style="text-decoration: underline;">Welcome <?php print_r($_SESSION['login_user']) ?></span></strong></h2>
</div>
<div>
    <div class="home">
        <form class="home-form" method="POST" actions="home.php">
            <div class="home-buttonWrapper">
                <button type="submit" class="btn btn-newForm" name="latest_request" id="latest_request">View latest requests</button>
                <button type="submit" class="btn btn-oldForm" name="old_requester" id="old_requester">View all user requests</button>
            </div>

        </form>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>