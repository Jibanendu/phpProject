<?php
    include('logindb.php');

    if (!isLoggedIn()) {
        $_SESSION['message'] = "You must log in first";
        header('location: Login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>User's Home Screen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>User Home Page</h2>
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
                    <a href="index.php?logout='1'" style="color: red;">logout</a>
                </small>

            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>