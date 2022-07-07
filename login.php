<?php
include './components/header.php';

if(isset($_SESSION['user'])){
    header('location:' . BASE_URL . '/htu_courses/home.php');
}
?>

<h1 class="text-center mt-5">Login Page</h1>
<div class="container">
    <div class="htu-login-mainContiner d-flex justify-content-center align-item-center mt-5">
        <form method="POST" action="./user_validation.php" class="w-50">
            <div class="mb-3">
                <label for="htuEmail" class="form-label">Email address</label>
                <input type="email"
                 name="email"
                  class="form-control"
                   id="htuEmail"
                    aria-describedby="emailHelp"
                     required
                     value="<?php 
                     if(isset($_SESSION['Invalid_user'])){
                        echo $_SESSION['Invalid_user']['email'];
                     }
                     ?>"
                     
                     >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="htuPassword" class="form-label">Password</label>
                <input type="password"
                 name="password"
                  class="form-control"
                   id="htuPassword" 
                   required
                   value="<?php  
                   if(isset ($_SESSION['Invalid_user'])){
                     echo $_SESSION['Invalid_user']['password'];
                   }
                   ?>"
                   
                   >
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <?php if(isset($_SESSION['errors'])): 
                    foreach($_SESSION['errors'] as $error){ ?>
                   <div class="alert alert-danger mt-3" role="alert">
                          <?= $error; ?>
                   </div>
               <?php } endif; ?>

           </form>
    </div>
</div>



<?php include './components/footer.php' ?>

