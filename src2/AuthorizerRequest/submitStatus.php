<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 27/02/2018
 * Time: 16:12
 */
    $decision = $_POST["decision"];
    $department =  ($_POST['department']);
    $forename    =  ($_POST['forename']);
    $surname     =  ($_POST['surname']);
    $startdate  =  ($_POST['com-date']);
    $returndate  =  ($_POST['ret-date']);
    $absence  =  ($_POST['absence']);
    $reason  =  ($_POST['reason']);
    $contact  =  ($_POST['contact']);
    $emergency  =  ($_POST['emer-contact']);
    $postcode  =  ($_POST['postcode']);
    $explanation  =  ($_POST['explanation']);
    $id= $_POST["id"];
    $db = mysqli_connect('localhost', 'root', 'root', 'Userlogin', 8889);
    $sql = "update Absence_form set status = '$decision' where id = '$id'";
    $query = mysqli_query($db, $sql);
    $date = date('Y-m-d H:i:s');
    $sqlIns = "INSERT INTO Authorise_form(id, department, firstname, surname, start_date, return_date, absence, reason, contact, emergency_contact, postcode, date_submitted, status, decision, explanation) VALUES ('$id', '$department','$forename','$surname','$startdate','$returndate','$absence','$reason','$contact','$emergency','$postcode','$date', 'Responded', '$decision', '$explanation')";
    if( mysqli_query($db, $sqlIns))
    {
       // echo "New record created successfully";
    } else {
        //echo "Error: " . $sqlIns . "<br>" . mysqli_error($db);
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:rgb(201,95,19);">
<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:0px;">
    <div class="container"><a class="navbar-brand" href="#">Royal Holloway</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="../AuthorizerHome/home.php" style="color:rgb(255,255,255);">Home </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(255,255,255);">Form </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<div></div>
<br><br><br>
<section>
    <?
        $sql2 = "SELECT * FROM Authorise_form WHERE id = '$id'";
        $query2 = mysqli_query($db, $sql2);
        while ($info = mysqli_fetch_array($query2)) {
            ?>
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
            <?php
        }
    ?>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

