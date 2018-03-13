<?php include('logindb.php') ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>
<form method="POST" action="registration.php">

    <?php echo show_error(); ?>

    <div class="user">

        <!--This will be a drop down list-->
        <input type="text" name="role" id="role" value="" placeholder="Enter Role">
    </div>
    <div class="user">
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter Email address">
    </div>
    <div class="user">
        <input type="text" name="forename" id="forename" value="" placeholder="Enter Forename">
    </div>
    <div class="user">
        <input type="text" name="surname" id="surname" value="" placeholder="Enter Surname">
    </div>
    <div class="user">
        <input type="password" name="password_1" id="password_1" placeholder="Enter Password">
    </div>
    <div class="user">
        <input type="password" name="password_2" id="password_2" placeholder="Confirm Password">
    </div>
    <div class="user">
        <button type="submit" class="button" name="register_button" id="register_button">register</button>
    </div>
    <p>
        <div class="user">
         <a href="Login.php">Sign in</a>
        </div>
    </p>
</form>
</body>
</html>