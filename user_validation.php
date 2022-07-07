<?php 
session_start();

require '../utilities/constants.php';
$error = false;
$error_msgs = array();

$email = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

    ///  Validate Email Address  ///

    if (!isset($_POST['email'])) {
        $error_msgs['No_submitted_email'] = 'Submit you email please!';
        $error = true;
    } else {

        if (empty($_POST['email'])) {
            $error_msgs['Empty_email!'] = 'Email is empty';
            $error = true;
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error_msgs['Wrong_pattern_input'] = 'Your input must be as an email address!';
                $error = true;
            }
        }
    }

    ///  Validate Password  ///

    if (!isset($_POST['password'])) {
        $error_msgs['No_submitted_password'] = 'Your didn\'t password!';
        $error = true;
    } else {
        if (empty($_POST['password'])) {

            $error_msgs['No_submitted_password'] = 'Your password is empty!';
            $error = true;
        } else {
            if (strlen($_POST['password']) < 5 || strlen($_POST['password']) > 20) {
                $error_msgs['No_submitted_password'] = 'Your password shoud be betwwen 5 & 20!';
                $error = true;
            }
        }
    }
} else {
    $error_msgs['No_submitted_password'] = 'Wrong request method or empty submitted!';
    $error = true;
}


///// Check if the exists /////

if (!$error) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $foundUser = null;

    foreach (USERS as $BDUser) {
        if ($BDUser['email'] == $email && $BDUser['password'] == $password) {
            $foundUser = $BDUser;
            }
    }
    if (empty($foundUser)) {
         $error_msgs['user_not_found'] = 'Incorrect Email or Password!';
        $error = true;
    }
}





if (!$error) {
    $_SESSION['user'] = $foundUser;
    header('location:' . BASE_URL . '/htu_courses/home.php');
  
} else {

    $_SESSION['errors'] = $error_msgs;
    $_SESSION['Invalid_user'] = Array(
        'email' => $email,
        'password' => $password
    );
  header('Location:' . $_SERVER['HTTP_REFERER']);
}





