<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', 'root', 'Userlogin', 8889);

    // variable declaration
    //$username = "";
   /* $email    = "";*/
    $errors   = array();

    // call the register() function if register_btn is clicked

    $department =  ($_POST['department']);
    $forename    =  ($_POST['forename']);
    $surname     =  ($_POST['surname']);
    $startdate  =  ($_POST['start']);
    $returndate  =  ($_POST['return']);
    $absence  =  ($_POST['absence']);
    $reason  =  ($_POST['reason']);
    $contact  =  ($_POST['contact']);
    $emergency  =  ($_POST['emergency']);
    $postcode  =  ($_POST['postcode']);
    $date = date('Y-m-d H:i:s');

// SUBMIT FORM DATA FOR USER
        // call these variables with the global keyword to make them available in function
    if ( isset($_POST['form_button']) ) {

        if ( count($errors) == 0 ) {
            $query = "INSERT INTO Absence_form (department, firstname, surname, start_date, return_date, absence, reason, contact, emergency_contact, postcode,date_submitted, status) VALUES ('$department','$forename','$surname','$startdate','$returndate','$absence','$reason','$contact','$emergency','$postcode','$date', 'Submitted')";
            mysqli_query($db, $query) or die(mysqli_error($db));
            $insertId = mysqli_insert_id($db);
            $query = "INSERT INTO latest_requests (user_id) VALUES ('$insertId')";
            mysqli_query($db, $query) or die(mysqli_error($db));
            $_SESSION['success']  = "Form submission was a success!";
//            header('location: ../RequesterHome/home.php');

            /*if (isset($_POST['type_user'])) {
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
            }*/
        }
    }

    if ( isset($_POST['save_button']) ) {

        $query = "INSERT INTO Saved_forms (department, firstname, surname, start_date, return_date, absence, reason, contact, emergency_contact, postcode,date_submitted, status) VALUES ('$department','$forename','$surname','$startdate','$returndate','$absence','$reason','$contact','$emergency','$postcode','$date', 'Saved')";
        mysqli_query($db, $query) or die(mysqli_error($db));
        $insertId = mysqli_insert_id($db);
        $query = "INSERT INTO latest_requests (user_id) VALUES ('$insertId')";
        mysqli_query($db, $query) or die(mysqli_error($db));
    }


// return user array from their id
    /*function getUserById($id){
        global $db;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($db, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }*/

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
?>