<?php

include './components/header.php';

if (!isset($_SESSION['user'])) {
    header('location:' . BASE_URL . '/htu_courses/login.php');
}


$raw_data = file_get_contents('./courses.json');
$courses = json_decode($raw_data);

?>



<div class="htu-home-mainContiner py-4 w-100 d-flex justify-content-center">
    <div class=" htu-landing-jum p-5 bg-light rounded-3 w-50 ">
        <div class="container-fluid my-5">
            <p style="letter-spacing: 2px;" id="htu-home-slogan" class="text-center">The right place to learn</p>
            <h1 class="display-5 fw-bold">HTU Students Courses</h1>

            <form method="GET" action="./search.php" class="form-inline my-2 my-lg-0">
                <input name="s" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>

        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row">
        
        <?php foreach($courses as $course ):  ?>

        <div class="col-4 my-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= $course->image; ?> >" alt="<?= $course->title; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $course->title ?></h5>
                    <p class="card-text"><?= $course->Excerpt ?></p>
                    <a href="./course_details.php?id=<?= $course->id; ?>" class="btn btn-primary">Check Course</a>
                    
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
include './components/footer.php';
?>