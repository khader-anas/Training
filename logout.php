<?php
require '../utilities/constants.php';
session_start();

session_destroy();
header('location: '. BASE_URL . '/htu_courses/login.php' );

