<?php
include './components/header.php';

if(isset( $_SESSION['user'])){

    header('Location:' . BASE_URL . '/htu_courses/home.php');
   // header('Location: http://' . $_SERVER['HTTP_HOST'] . '/htu_courses/home.php');
}
?>


<div class="htu-landing-mainContiner py-4 w-100 d-flex justify-content-center">
    <div class=" htu-landing-jum p-5 bg-light rounded-3 w-50 ">
        <div class="container-fluid my-5">
            <h1  class="display-5 fw-bold">HTU Students Courses</h1>
            <p class="col-md-8 fs-4">This website contains courses for HTU students only. Please login using the below button if you are an HTU student.</p>
            <a class="btn btn-primary btn-lg" href="<?= $home_url .'login.php'?>" type="button" >Login</a>
        </div>
    </div>
    </div> 



    <?php include './components/footer.php' ?>


