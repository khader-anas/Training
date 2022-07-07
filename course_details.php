<?php
include('./components/header.php');

if (!isset($_SESSION['user'])) {
    header('location:' . BASE_URL . '/htu_courses/login.php');
}


if (!isset($_GET['id'])) {
    header('location:' . BASE_URL . '/htu_courses/home.php');
}

$course_id = (int) $_GET['id'];
$course = null;
$raw_data = file_get_contents('./courses.json');
$courses = json_decode($raw_data);


foreach ($courses as $cour) {

    if ($course_id == $cour->id) {
        $course = $cour;
        break;
    }
}

if(empty($course)){
    header('location:' . BASE_URL . '/htu_courses/home.php');
}
?>


<div class="container">
    <h1 class="text-center my-5">Course Title</h1>
    <div class="row my-5">
        <div class="col-6">
            <img src="<?= $course->image ?>" alt="">
        </div>
        <div class="col-6">
            <p> <strong>Auther:</strong><?= $course->Auther ?> </p>
            <p> <strong>Date:</strong><?= $course->date ?> </p>
            <p> <strong>Rating:</strong><?= $course->Rating ?> </p>
            <p> <strong>Content:</strong><?= $course->content ?> </p>
        </div>
    </div>
    <hr class="my-5">
    <div class="row my-5 d-flex justify-content-center align-content-center">
        <div class="col-12">
            <?= $course->course_video ?>
        </div>
    </div>
</div>





<?php include('./components/footer.php'); ?>