<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', '', 'Userlogin', 8889);

    $errors   = array();

    if ( isset($_POST['form_button']) ) {
        form();
    }

    // SUBMIT FORM DATA FOR USER
    function form(){
        // call these variables with the global keyword to make them available in function
        global $db, $errors, $email;

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
        $decision = $_POST["decision"];
        $explanation  =  ($_POST['explanation']);


        if (empty($department)) {
            array_push($errors, "Please enter the Department!");
        }
        if (empty($forename)) {
            array_push($errors, "Please enter your forename!");
        }
        if (empty($surname)) {
            array_push($errors, "Please enter your surname!");
        }
        if (empty($startdate)) {
            array_push($errors, "Specify the date you will be commencing your leave of absence.");
        }
        if (empty($returndate)) {
            array_push($errors, "Specify the date you will be returning from your leave of absence");
        }
        if (empty($absence)) {
            array_push($errors, 'Please select the reason for your absence!');
        }
        if (empty($reason)) {
            array_push($errors, 'Please specify a reason for taking a leave of absence!');
        }
        if (empty($contact)) {
            array_push($errors, 'Please enter your contact details!');
        }
        if (empty($emergency)) {
            array_push($errors, 'Please specify an emergency contact!');
        }
        if (empty($postcode)) {
            array_push($errors, 'Please specify the postcode for the location of your absence!');
        }
        if (empty($decision)) {
            array_push($errors, 'Please either authorize or deny the request!');
        }
        if (empty($explanation)) {
            array_push($errors, 'Please give an explanation for the decision!');
        }


        if ( count($errors) == 0 ) {
            $date = date('Y-m-d H:i:s');
            $query = "INSERT INTO Authorizer_form(id, department, firstname, surname, start_date, return_date, absence, reason, contact, emergency_contact, postcode, date_submitted, status, decision, explanation) VALUES ('$department','$forename','$surname','$startdate','$returndate','$absence','$reason','$contact','$emergency','$postcode','$date', 'Responded', '$decision', '$explanation')";
            mysqli_query($db, $query) or die(mysqli_error($db));
            //echo $insertId;
            //$_SESSION['success']  = "Form submission was a success!";

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