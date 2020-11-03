<?php
include ('includes/DB.php');
?>
<?php
$title = $autor =  $currentTime = $Image = $Target = $text=$eventTime=$place='';
$errors = array('title'=>'','text'=>'','eventTime'=>'','place'=>'');

if(isset($_POST['submit'])){

    if(isset($_POST['title'])){
        if(empty($_POST['title'])){
            $errors['title'] = "Насловот е задолжителен";
        }else {
            $title = $_POST['title'];
            if(!preg_match("/^[а-жА-Жa-zA-Z\s].{2,}+$/",$title)){
                $errors['title'] = "Невалиден формат(минимум 3 карактери и користи само букви и празно место )";
            }
        }
    }


    if(isset($_POST['eventTime'])){
        if(empty($_POST['eventTime'])){
            $errors['eventTime'] = "Времето на случување на настанот е задолжително";
        }else {
            $eventTime = $_POST['eventTime'];
            if(!preg_match("/^([0-2][1-9]|3[0-1])-(0[1-9]|1[0-2])-([1-2][0-9]{3})-([0-1][0-9]|2[0-3]):([0-5][0-9])$/",$eventTime)){
                $errors['eventTime'] = "Невалиден формат(dd-mm-yyyy-hh:mm)";
            }
        }
    }

    if(isset($_POST['place'])){
        if(empty($_POST['place'])){
            $errors['place'] = "Mестото на одржување на настанот е задолжително";
        }else {
            $place = $_POST['place'];
            if(strlen($place) < 6){
                $errors['place'] = "Премногу кратко објаснување, Минимум 6 карактери";
            }else if(strlen($place) >60 ){
                $errors['place'] = "Премногу долго објаснување, Максимум 60 карактери";
            }
        }
    }

    if(isset($_POST['text'])){
        if(empty($_POST['title'])){
            $errors['text'] = "Дополнително објасснување за настанот е задолжително";
        }else {
            $text = $_POST['text'];
            if(strlen($text) < 30){
                $errors['text'] = "Минимум 30 карактери";
            }else if(strlen($text) >500 ){
                $errors['text'] = "Максимум 500 карактери";
            }
        }
    }
    if(array_filter($errors)){
        //errors
    }else{
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $text = mysqli_real_escape_string($conn,$_POST['text']);
        $place = mysqli_real_escape_string($conn,$_POST['place']);
        $Image = $_FILES['Image']['name'];
        $Target = "uploads/".basename($_FILES["Image"]["name"]);
        date_default_timezone_set('Europe/Skopje');
        $currentTime  = time();
        $dateTime = strftime("%B-%d-%Y %H:%M:%S",$currentTime);
        $autor = $_SESSION['username'];

       

        $sql = "INSERT INTO events (title,datetime,image,text,eventime,place) VALUES ('$title','$dateTime','$Image','$text','$eventTime','$place')";

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


<?php include ("templates/header.php"); ?>
    <div class="container registerContainer mt-4">
        <div class="row">
            <div class="offset-3"></div>
            <div class="col-lg-6">
                <div class="card  text-light" style="background-color: #F51927">
                    <div class="card-header registerFormHeader">
                        <h5 class="text-center text-light">Додадете Нов Настан </h5>
                    </div>
                    <div class="card-body bg-dark">
                        <form action="addNewEvent.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white registerIcons"><i class="fas fa-calendar-week"></i></span>
                                    </div>
                                    <input class="form-control <?php if( $errors['title']){echo 'formControlError';}?>" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>"  placeholder="Наслов на настанот">
                                </div>
                                <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['title'] ?></div>
                            </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <input class="form-control <?php if( $errors['eventTime']){echo 'formControlError';}?>" type="text" name="eventTime" value="<?php echo htmlspecialchars($eventTime); ?>"  placeholder="Датум и време на настанот">
                            </div>
                                 <div class="red-text" style="color:red;"> <?php echo $errors['eventTime'];?></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input class="form-control <?php if( $errors['place']){echo 'formControlError';}?>" type="text" name="place" value="<?php echo htmlspecialchars($place); ?>"  placeholder="Локација на настанот">
                            </div>
                                 <div class="red-text" style="color:red;"> <?php echo $errors['place'];?></div>
                        </div>


                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" name="Image" id="imageSelect" value="" >
                                    <label for="imageSelect" class="custom-file-label"> Избери слика</label>
                                    <!-- for= and also id= of input need to be equal -->
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control <?php if( $errors['text']){echo 'formControlError';}?>"  name="text" cols="80" rows="5" value="<?php echo  htmlspecialchars($text); ?>" placeholder="Информации за настанот"><?php echo  htmlspecialchars($text); ?></textarea>
                                <div class="red-text" style="color:red;"> <?php echo $errors['text'];?></div>
                            </div>


                            <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Додадете нов настан "/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php  include_once ('templates/footer.php')?>