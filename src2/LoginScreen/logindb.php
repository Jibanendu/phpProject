<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', '', 'Userlogin', 8889);

    // variable declaration
    //$username = "";
    $email    = "";
    $errors   = array();

    // call the register() function if register_btn is clicked
    if ( isset($_POST['register_button']) ) {
        register();
    }

    if ( isset($_POST['login_button']) ) {
        login();
    }

    // REGISTER USER
    function register(){
        // call these variables with the global keyword to make them available in function
        global $db, $errors, $email;

        $email       =  ($_POST['email']);
        $role        =  ($_POST['role']);
        $forename    =  ($_POST['forename']);
        $surname     =  ($_POST['surname']);
        $password_1  =  ($_POST['password_1']);
        $password_2  =  ($_POST['password_2']);


        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($role)) {
            array_push($errors, "Role is required");
        }
        if (empty($forename)) {
            array_push($errors, "Forename is required");
        }
        if (empty($surname)) {
            array_push($errors, "Surname is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if (empty($password_2)) {
            array_push($errors, 'Password confirmation is required');
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        if ( count($errors) == 0 ) {
            $encryptedPass = password_hash($password_1, PASSWORD_DEFAULT);

            if (isset($_POST['type_user'])) {
                $user_type = e($_POST['type_user']);
                $query = "INSERT INTO users (firstname, lastname, email, type_user, password, role) VALUES('$forename', '$surname', '$email', '$user_type', '$encryptedPass', '$role')";
                mysqli_query($db, $query) or die(mysql_error($db));
                $_SESSION['success']  = "New user successfully created!!";
                header('location: home.php');
            } else {
                $query = "INSERT INTO users (firstname, lastname, email, type_user, password, role) VALUES ('$forename', '$surname', '$email', 'user', '$encryptedPass', '$role')";
                mysqli_query($db, $query) or die(mysql_error($db));
                $logged_in_user_id = mysqli_insert_id($db);
                $_SESSION['user'] = getUserById($logged_in_user_id);
                $_SESSION['success'] = 'You are now logged in';
                header('location: index.php');
            }
        }
    }

    function login(){
        global $db, $email, $errors;

        $email = $_POST['email'];
        $password = $_POST['password'];

        // make sure form is filled properly
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if ( count($errors) == 0 ) {

            $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
            $result = mysqli_query($db, $query);

            if ( mysqli_num_rows($result) == 1 ) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $dbPassword = $row['password'];

                if ( password_verify($password, $dbPassword) ) {
                    $logged_in_user = $row['type_user'];
                    $user_type = $row['role'];
                    $user_name = $row['firstname'];
                    $lastname = $row['lastname'];

                    if ( $logged_in_user == 'admin' ) {
                        $_SESSION['login_user'] = $user_name;
                        $_SESSION['lastname'] = $lastname;
                        header('location: ../Admin/newuser.php');
                    } else {
                        if ($user_type == 'Requester') {
                            $_SESSION['login_user'] = $user_name;
                            $_SESSION['lastname'] = $lastname;
                            header('location: ../RequesterHome/home.php');
                        } else {
                            $_SESSION['login_user'] = $user_name;
                            $_SESSION['lastname'] = $lastname;
                            header('location: ../AuthorizerHome/home.php');
                        }
                    }
                } else {
                    array_push($errors, 'Passwords do not match!');
                }
            } else {
                array_push($errors, "You have entered the wrong email or password!");
            }

        }

    }

// return user array from their id
    function getUserById($id){
        global $db;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($db, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function eForm($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val));
    }

    function show_error() {
        global $errors;
        if (count($errors) > 0){
            echo '<div class="error">';
            foreach ($errors as $error){
                echo $error .'<br>';
            }
            echo '</div>';
        }
    }

    function isLoggedIn()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }else{
            return false;
        }
    }

    function isAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin' ) {
            return true;
        }else{
            return false;
        }
    }
?>