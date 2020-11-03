<?php
include_once('includes/DB.php');
include ('templates/header.php');
include ('templates/server.php');

?>


<div class="container registerContainer mt-4">
<div class="row">
    <div class="offset-3"></div>
    <div class="col-lg-6">
        <div class="card bg-secondary text-light">
            <div class="card-header registerFormHeader">
                <h5 class="text-center text-light">Sign in! </h5>
            </div>
            <div class="card-body bg-dark">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white registerIcons"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control " type="text" name="username" value="<?php echo  htmlspecialchars($username); ?>"  placeholder="Username">
                        </div>
                        <div class="red-text" style="color:red;"> <?php  echo $loginErrors['username']; ?> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white registerIcons"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input class="form-control " type="password" name="password" value=""  placeholder="Password">
                        </div>
                        <div class="red-text" style="color:red;"> <?php  if($loginErrors['password']){echo $loginErrors['password']; }
                                                                         elseif (!$loginErrors['password'] && !$loginErrors['username']){
                                                                          echo $loginErrors['wrongCredentials'];} ?> </div>
                    </div>

                    <input type="submit" name="login" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Login"/>
                </form>
                <p class="text-center mt-3">You do not have account? <a href="<?php echo 'register.php'; ?>"> Register here</a></p>
            </div>
        </div>
    </div>
</div>
</div>