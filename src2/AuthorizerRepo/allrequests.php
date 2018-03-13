<?php
include('../LoginScreen/logindb.php');
$db = mysqli_connect('localhost', 'root', '', 'Userlogin', 8889);
$sql = "SELECT distinct firstname,surname FROM Authorizer_form where status in('Denied','Authorized')";
$query = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>requests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
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
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(255,255,255);">Form </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../LoginScreen/Login.php" style="color:rgb(255,255,255);">Logout </a></li>
            </ul>
        </div>
    </div>
</nav>
<h1>Absence Requests</h1>
<div></div>
<div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="data-table">
            <thead>
            <tr>
                <th>Staff Member</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>  <select name="userSelection">
                        <?php
                        $no = 1;
                        $total = 0;

                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $row['firstname'] ?>-<?php echo $row['surname'] ?>" checked> <?php echo $row['firstname'] ?>  <?php echo $row['surname'] ?> </option>
                            <?php
                            $no++;
                        }
                        ?>
                    </select>
                </td>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
            </tbody>
        </table>
    </form>

</div>


<?php

if($_POST)
{
    list($firstname, $lastname) = explode("-",$_POST['userSelection']);
    $sqlView = "SELECT * FROM Authorizer_form WHERE  firstname='$firstname' and surname='$lastname' and status in('Denied','Authorized')";
    $queryResult = mysqli_query($db, $sqlView);

    ?>



    <div class="container">
        <table class="data-table">
            <thead>
            <tr>
                <th scope="col">Staff Member</th>
                <th scope="col">Date and time of submission</th>
                <th scope="col">Reason for Absence</th>
                <th scope="col">Form</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($queryResult)) { ?>
                <tr scope="row">
                    <td> <?php echo $row['firstname'] ?> </td>
                    <td> <?php echo $row['date_submitted'] ?> </td>
                    <td> <?php echo $row['absence'] ?> </td>
                    <td> <a href="../AuthorizerRepo/form.php?id=<?php echo $row['id'] ?>">View form</a> </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
<?php   } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>