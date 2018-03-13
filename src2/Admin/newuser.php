<?php include('../LoginScreen/logindb.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../LoginScreen/style.css">

</head>
<body>
<div class="header">
    <h2>Create user</h2>
</div>
<form method="POST" action="newuser.php">

    <?php echo show_error(); ?>

    <div class="user">

        <!--This will be a drop down list-->
        <input type="text" name="role" value="" id="role" placeholder="Enter Role">
    </div>
    <div class="user">
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter Email address">
    </div>
    <div class="user">
        <label>Type of User</label>
        <select name="type_user" id="type_user" >
            <option value=""></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
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
        <button type="submit" class="button" name="register_button" id="register_button">Create user</button>
    </div>
</form>
</body>
</html>