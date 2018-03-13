<?php
    include('../LoginScreen/logindb.php');
    $db = mysqli_connect('localhost', 'root', 'root', 'Userlogin', 8889);
    $sql = "SELECT * FROM Absence_form WHERE firstname = '" . $_SESSION['login_user'] . "' AND surname = '" . $_SESSION['lastname'] . "' AND status != 'Saved'";
    $query = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Requests</title>1
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
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
                <li class="nav-item" role="presentation"><a class="nav-link" href="../RequesterHome/home.php" style="color:rgb(255,255,255);">Home </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../RequesterForm/form.php" style="color:rgb(255,255,255);">Form </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<div>
    <h2 class="text-center text-dark" style="height:48px;"><strong><span style="text-decoration: underline;">Leave of absence form</span></strong></h2>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-6">
                <table class="data-table">
                    <thead>
                    <tr>
                        <th scope="col">Reason for Absence</th>
                        <th scope="col">Date and time of submission</th>
                        <th scope="col">Absence status</th>
                        <th scope="col">Form</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <tr scope="row">
                            <td> <?php echo $row['absence'] ?> </td>
                            <td> <?php echo $row['date_submitted'] ?> </td>
                            <td> <?php echo $row['status'] ?> </td>
                            <td> <a href="../AuthorizerForm/form.php?id=">View form</a> </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="col-md-4 col-lg-6 offset-lg-0"></div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>