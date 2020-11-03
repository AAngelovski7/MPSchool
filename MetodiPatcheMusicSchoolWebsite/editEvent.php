<?php
include_once ('includes/DB.php');
$urlId = $_GET['id'];
$title = $autor =  $currentTime= $Image = $Target ='';
$errors = array('title'=>'','text'=>'');

$query = "SELECT * FROM events WHERE id='$urlId'";
$query_result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($query_result);

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $text = $_POST['text'];
    $autor = $_SESSION['username'];
    $Image = $_FILES["Image"]["name"];  //$_FILES BECAUSE WE USE IMAGE , AND CAN NOT BE SAVE DIRECTLY INTO DB
    $Target = "uploads/".basename($_FILES["Image"]["name"]);//take base name of the image that user will enter
    date_default_timezone_set('Europe/Skopje');
    $currentTime  = time();
    $dateTime = strftime("%b-%d-%Y %H:%M:%S",$currentTime);

    if(isset($_POST['title'])){
        if(empty($_POST['title'])){
            $errors['title'] = "Насловот е задолжителен";
        }else {
            $title = $_POST['title'];
            if(!preg_match("/^[а-жА-Ж\s].{2,}+$/",$title)){
                $errors['title'] = "Невалиден формат(минимум 3 карактери и користи само букви и празно место )";
            }
        }
    }
    if(isset($_POST['text'])){
        if(empty($_POST['title'])){
            $errors['text'] = "Дополнително објасснување за настанот е задолжително";
        }else {
            $text = $_POST['text'];
            if(strlen($text) < 30 && strlen($text) !=0){
                $errors['text'] = "Минимум 30 карактери";
            }else if(strlen($text) >500 ){
                $errors['text'] = "Максимум 500 карактери";
            }
        }
    }

    if(array_filter($errors)){
        //errors
    }else{
        //Query to UPDATE POST into DataBaase when everything is okay
        if(!empty($_FILES["Image"]["name"])){
            $sql = "UPDATE events SET title = '$title', datetime= '$dateTime',image = '$Image',text='$text' WHERE id = '$urlId' ";
        }else{
            $sql = "UPDATE events SET title = '$title', datetime= '$dateTime',text='$text' WHERE id = '$urlId' ";
        }
        if(mysqli_query($conn,$sql)){
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            header('Location:events.php');
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
                    <h5 class="text-center text-light">Измени Постоечки Настан </h5>
                </div>
                <div class="card-body bg-dark">
                    <?php //Fetching Existing Content according to our
                    $sql = "SELECT * FROM events WHERE id = '".$urlId."'";
                    $results = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($results);
                    ?>
                    <form action="editEvent.php?id=<?php echo $urlId?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white registerIcons"><i class="fas fa-calendar-week"></i></span>
                                </div>
                                <input class="form-control <?php if( $errors['title']){echo 'formControlError';}?>" type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"  placeholder="Наслов на настанот">
                            </div>
                            <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['title'] ?></div>
                        </div>
                        <div class="form-group">
                            <span class="Fieldinfo"> Existing Image : </span>
                            <img class="mb-2" src="uploads/<?php echo $row['image']; ?>" width="100px"; height="60px"; alt="">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="Image" id="imageSelect" value="<?php $row['image'] ?>">
                                <label for="imageSelect" class="custom-file-label"> Избери слика</label>
                                <!-- for= and also id= of input need to be equal -->
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control <?php if( $errors['text']){echo 'formControlError';}?>"  name="text" cols="80" rows="5" value="<?php echo  htmlspecialchars($row['text']); ?>" placeholder="Информации за настанот"><?php echo  htmlspecialchars($row['text']); ?></textarea>
                            <div class="red-text" style="color:red;"> <?php echo $errors['text'];?></div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Измени го настанот"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once ("templates/footer.php");?>






