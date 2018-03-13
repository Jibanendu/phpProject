<?php
    include('../LoginScreen/logindb.php');

    if (!isAdmin()) {
        $_SESSION['msg'] = "Please login first!";
        header('location: ../LoginScreen/Login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../LoginScreen/style.css">
</head>
<body>
    <div class="header">
        <h2>Admin user home page</h2>
    </div>
    <div class="content">

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>


        <div class="user_info">

            <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['type_user']); ?>)</i>
                        <br>
                        <a href="home.php?logout='1'" style="color: red;">Logout</a>
                        &nbsp; <a href="newuser.php">New user</a>
                    </small>

                <?php endif ?>
            </div>
        </div>
    </div>

</body>
</html>