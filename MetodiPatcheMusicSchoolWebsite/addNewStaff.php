<?php
include_once ('includes/DB.php');
?>
<?php
$firstName = $lastName = $email =  $workFrom = $Image = $Target = $info='';
$errors = array('firstName'=>'','lastName'=>'','email'=>'','workFrom'=>'','role'=>'','info'=>'');
$role = ['Директор','Секретар','Професор по Виолина','Професор по Гитара','Професор по Флејта','Професор по Пијано','Професор по Кларинет','Професор по Хармоника'];
if(isset($_POST['submit'])){
    if(isset($_POST['first_name'])){
        if(empty($_POST['first_name'])){
            $errors['firstName'] = 'Името е задолжително';
        }else {
            $firstName = $_POST['first_name'];
            if(!preg_match("/^[A-ZА-Ж]+[a-zа-ж]/",$firstName)){
                $errors['firstName'] = "Невалиден формат (Започнете со голема буква и користете само букви)";
            }
        }
    }
    if(isset($_POST['last_name'])){
        if(empty($_POST['last_name'])){
            $errors['lastName'] = 'Презимето е задолжително';
        }else {
            $lastName = $_POST['last_name'];
            if(!preg_match("/^[A-Z\p{Cyrillic}]+[a-z\p{Cyrillic}]([\ A-Z\p{Cyrillic}]+[a-z\p{Cyrillic}]+$)*/u",$lastName)){
                $errors['lastName'] = "Невалиден формат (Започнете со голема буква и користете само букви и празни места)";
            }
        }
    }
    if(isset($_POST['email'])){
        if(empty($_POST['email'])){
            $errors['email'] = "Емаил адресата е задолжителна";
        }else{
            $email = $_POST['email'];
            if(!filter_var( $email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "Невалидна емаил адреса";
            }
        }
    }
    if (isset($_POST['work_from'])){
        if(empty($_POST['work_from'])){
            $errors['workFrom'] = "Годината на вработување е задолжителна";
        }else {
            $workFrom = $_POST['work_from'];
            if(!preg_match("/^[0-9]{4}/", $workFrom)){
                $errors['workFrom'] = "Внесете валиден формат (пр:2000)";
            }
        }
    }
    if(isset($_POST['info'])){
        if(empty($_POST['info'])){
            $errors['info'] = "Внесете некој дополнителни информации за вработените";
        }else{
            $info = $_POST['info'];
            if(mb_strlen($info) < 30 || mb_strlen($info) ==0){
                $errors['info']="Најмалку користете 30 карактери";
            }else if(mb_strlen($info) > 201){
                $errors['info'] = "Махимум користете 200 карактери";
            }
        }
    }

    if(array_filter($errors)){
        //errors
    }else{
       
        $firstName = mysqli_real_escape_string($conn,$_POST['first_name']);
        $lastName = mysqli_real_escape_string($conn,$_POST['last_name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        $workFrom = mysqli_real_escape_string($conn,$_POST['work_from']);
        $Image = $_FILES['Image']['name'];  //$_FILES BECAUSE WE USE IMAGE , AND CAN NOT BE SAVE DIRECTLY INTO DB
        $Target = "uploads/".basename($_FILES["Image"]["name"]);//take base name of the image that user will enter
        $info = mysqli_real_escape_string($conn,$_POST['info']);

        $sql = "INSERT INTO staffs (first_name,last_name,email,role,work_from,image,info) VALUES ('$firstName','$lastName','$email','$role','$workFrom','".$Image."','".$info."')";
//        move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
        if(mysqli_query($conn,$sql)){
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            header('Location:index.php');
        }else{
            echo 'Connection error' .mysqli_error($conn);
            header('Location:errorPage.php');
        }
    }
}
?>

<?php include_once ("templates/header.php");
?>
<div class="container registerContainer mt-4">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-lg-6">
            <div class="card  text-light" style="background-color: #F51927">
                <div class="card-header registerFormHeader">
                    <h5 class="text-center text-light">Додадете Нов Вработен </h5>
                </div>
                <div class="card-body bg-dark">
                    <form action="addNewStaff.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white registerIcons"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control <?php if( $errors['firstName']){echo 'formControlError';}?>" type="text" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>"  placeholder="Име">
                                <input class="form-control ml-2 <?php if( $errors['lastName']){echo 'formControlError';}?>" type="text" name="last_name" value="<?php  echo htmlspecialchars($lastName); ?>" placeholder="Презиме" >
                            </div>
                            <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['firstName'] ?></div>
                            <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['lastName'] ?></div>

                            <!-- <div class="red-text" style="color:red;"> <?php if(strlen($errors['lastName']) < 25){echo $errors['lastName']; } ?> </div> -->

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-envelope""></i></span>
                                </div>
                                <input class="form-control<?php if( $errors['email']){echo 'formControlError';}?> " type="text" name="email" value="<?php echo htmlspecialchars($email);?>"  placeholder="Емаил-адреса">
                            </div>
                            <div class="red-text" style="color:red;"> <?php echo $errors['email'] ?> </div>
                        </div>

                        <div class="form-group">
<!--                            <label for="CategoryTitle"> <span class="">Choose Role at work</span></label> <br>-->
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white  registerIcons"><i class="fas fa-briefcase""></i></span>

                            <select class="form-control" name="role" id="role">
                                <option value=""  disabled selected>Позиција</option>
                                   <?php  for($i=0;$i<count($role);$i++) {?>
                                    <option value="<?php  echo $role[$i] ?>"> <?php echo $role[$i]    ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-briefcase""></i></span>
                                </div>
                                <input class="form-control <?php if( $errors['workFrom']){echo 'formControlError';}?>" type="text" name="work_from" value="<?php echo htmlspecialchars($workFrom) ?>"  placeholder="Година на вработување">
                            </div>
                            <div class="red-text" style="color:red;"> <?php echo $errors['workFrom'];?></div>
                        </div>


                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="Image" id="imageSelect" value="" >
                                <label for="imageSelect" class="custom-file-label"> Избери слика</label>
                                <!-- for= and also id= of input need to be equal -->
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control <?php if( $errors['info']){echo 'formControlError';}?>"  name="info" cols="80" rows="5" value="<?php echo  htmlspecialchars($info); ?>" placeholder="Основни информации за вработениот (пр:образование...)"><?php echo  htmlspecialchars($info); ?></textarea>
                            <div class="red-text" style="color:red;"> <?php echo $errors['info'];?></div>
                        </div>


                        <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Додадете нов вработен"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once ("templates/footer.php");
?>