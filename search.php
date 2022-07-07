<?php
include('./components/header.php');


if (!isset($_SESSION['user'])) {
    header('location:' . BASE_URL . '/htu_courses/login.php');
}

$found_course = null;

$raw_data = file_get_contents('./courses.json');
$courses = json_decode($raw_data);

if (!isset($_GET['s'])) {
    header('location:' . BASE_URL . '/htu_courses/home.php');
}

$key_word = $_GET['s'];
$found_course = array();


    

foreach($courses as $course){
    if(strpos(strtolower( $course->title ) , strtolower( $key_word)) !== false){
        array_push($found_course , $course);

        }
} 

// if($_GET['s'] == $courses->title){
//     $found_course = $cour;
//     echo'welcome';
//     }


?>


<div id="htu-courses-search" class="container my-5">
    <h1 class="text-center my-5">Search Courses</h1>
    <?php if (!empty($found_course)) { ?>
        <?php foreach ($found_course as  $course) : ?>
            <div class="htu-search-course-container row">

                <div class="col-6">
                    <img src="<?= $course->image; ?>" class="img-thumbnail" alt="<?= $course->title; ?>">
                </div>


                <div class="col-6">
                    <div class="d-flex flex-column"></div>
                    <h4><?= $course->title; ?></h4>
                    <p><?= $course->Excerpt; ?></p>
                    <a href="./course_details.php?id=<?= $course->id ?>" class="btn btn-primary">Check Course</a>
                </div>
            </div>
            <hr class="my-5">
        <?php endforeach; ?>
    <?php } else { ?>

        <p class="text-center"> No course was found for "<?= $key_word ?>" </p>

    <?php } ?>
</div>





<?php
include('./components/footer.php');
?>