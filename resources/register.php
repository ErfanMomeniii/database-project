<?php
require ('../model/User.php');
if(isset($_POST['password'])){
    if($_POST['password']!=$_POST['confirm_password']){
        $error='!گذرواژه و تکرار گذرواژه یکسان نیستند';
    }
}
if(!isset($error) && isset($_POST['username'])){
   $model['userName']=$_POST['username'];
   $model['password']=$_POST['password'];
   $model['email']=$_POST['email'];
   try {
   (new User())->save($model);
   $_GET['data'].='<div class="alert alert-success" role="alert">شما با موفقیت عضو شدید</div>';
   }catch (Exception $e){
       $error=$e->getMessage();
       header("location: register.php ");
   }
   header("location: main_ui.php ");
}
else {
    $_GET['data'] = '<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">عضویت</p>
                <form class="mx-1 mx-md-4" action="register.php" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label"  for="username">نام کاربری</label>
                      <input type="text" id="username" name="username" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label"  for="email">پست الکترونیک</label>
                      <input type="email" id="email" name="email" class="form-control" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label"  for="password">گذر واژه</label>
                      <input type="password" id="password" name="password" class="form-control" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label"  for="confirm_password">تکرار گذر واژه</label>
                      <input type="password" id="confirm_password" name="confirm_password" class="form-control" required/>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">ثبت نام</button>
                  </div>

                </form>
                ';
    if (isset($error)) {
        $_GET['data'].='<div class="alert alert-danger" role = "alert" >'.$error.'</div >';
        }
              $_GET['data'].='</div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../public/images/alejandro-escamilla-LNRyGwIJr5c-unsplash.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';
}
include 'main_ui.php';