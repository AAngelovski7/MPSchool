<?php
include ('includes/DB.php'); ?>

<?php include ('templates/server.php');?>

<?php
include ("templates/header.php");
?>

<div class="container registerContainer mt-4">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-lg-6">
            <div class="card bg-secondary text-light">
                <div class="card-header registerFormHeader">
                    <h5 class="text-center text-light">REGISTER NOW! </h5>
                </div>
                <div class="card-body bg-dark">
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white registerIcons"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control " type="text" name="username" value="<?php echo  htmlspecialchars($username); ?>"  placeholder="Username">
                            </div>
                            <div class="red-text" style="color:red;"> <?php  echo $errors['username']; ?> </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white registerIcons"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input class="form-control " type="text" name="email" value="<?php echo  htmlspecialchars($email); ?>"  placeholder="Email">
                            </div>
                            <div class="red-text" style="color:red;"> <?php  echo $errors['email']; ?> </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-lock"></i></span>
                                </div>
                                <input class="form-control " type="text" name="password" value="<?php echo  htmlspecialchars($password); ?>"  placeholder="Password">
                            </div>
                            <div class="red-text" style="color:red;"> <?php if($errors['emptyPassword'])
                                {echo $errors['emptyPassword'];}
                                else{
                                    echo $errors['password'];
                                }
                                ?> </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-check-circle""></i></span>
                                </div>
                                <input class="form-control " type="password" name="confirmPassword" value=""  placeholder="Confirm Password">
                            </div>
                            <div class="red-text" style="color:red;"> <?php  echo $errors['confirmPassword']; ?> </div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Register"/>
                    </form>
                    <p class="text-center mt-3">Have already acount? <a href="<?php echo 'login.php'; ?>"> Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
