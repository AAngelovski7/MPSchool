<?php
include_once ('includes/DB.php');
$urlId = $_GET['id'];
$firstName = $lastName = $email =  $workFrom = $Image = $Target = $roleFunction=$info='';
$errors = array('firstName'=>'','lastName'=>'','email'=>'','workFrom'=>'','role'=>'','info'=>'');
$role = ['Director','Secretary','Violin Teacher','Guitar Teacher'];

$query = "SELECT * FROM staffs WHERE id='$urlId'";
$query_result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($query_result);

if(isset($_POST['submit'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    if(!isset($_POST['role'])){
        $roleFunction = $data['role'];
    }else{
        $roleFunction = $_POST['role'];
    }
    $workFrom = $_POST['work_from'];
    $info = $_POST['info'];
    $Image = $_FILES["Image"]["name"];  //$_FILES BECAUSE WE USE IMAGE , AND CAN NOT BE SAVE DIRECTLY INTO DB
    $Target = "uploads/".basename($_FILES["Image"]["name"]);//take base name of the image that user will enter

    if(isset($_POST['first_name'])){
        if(empty($_POST['first_name'])){
            $errors['firstName'] = 'First Name is required';
        }else {
            $firstName = $_POST['first_name'];
            if(!preg_match("/^[A-ZА-Жа-жa-z]+/",$firstName)){
                $errors['firstName'] = "Invalid format (Start with uppercase letter and only leters allowed).";
            }
        }
    }
    if(isset($_POST['last_name'])){
        if(empty($_POST['last_name'])){
            $errors['lastName'] = 'Last Name is required.';
        }else {
            $lastName = $_POST['last_name'];
            if(!preg_match("/^[A-ZА-Жa-zа-ж]+([\ A-ZА-Жa-zа-ж]+)*/",$lastName)){
                $errors['lastName'] = "Invalid format (Start with uppercase letter, only letters and spaces allowed).";
            }
        }
    }
    if(isset($_POST['email'])){
        if(empty($_POST['email'])){
            $errors['email'] = "Email is required";
        }else{
            $email = $_POST['email'];
            if(!filter_var( $email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "Enter valid email";
            }
        }
    }
    if (isset($_POST['work_from'])){
        if(empty($_POST['work_from'])){
            $errors['workFrom'] = "Year of starting to work is required";
        }else {
            $workFrom = $_POST['work_from'];
            if(!preg_match("/^[0-9]{4}/", $workFrom)){
                $errors['workFrom'] = "Enter valid year of starting to work (ex:2000)";
            }
        }
    }
    if(isset($_POST['info'])){
        if(empty($_POST['info'])){
            $errors['info'] = "Pleas provide some aditional information about employe";
        }else{
            if(mb_strlen($info) < 30 && mb_strlen($info) !=0){
                $errors['info']="At least use 30 letters";
            }else if(mb_strlen($info)>201){
                $errors['info']="Use up to 200 characters";
            }
        }
    }
if(array_filter($errors)){
    //errors
}else{

    if(!empty($_FILES["Image"]["name"])){
        $sql = "UPDATE staffs SET first_name = '$firstName', last_name = '$lastName', email = '$email',
        role = '$roleFunction', work_from='$workFrom',image = '$Image',info='$info' WHERE id = '$urlId' ";
    }else{
        $sql = "UPDATE staffs SET first_name = '$firstName', last_name = '$lastName', email = '$email',
        role = '$roleFunction', work_from='$workFrom', info='$info' WHERE id = '$urlId'";
    }
    if(mysqli_query($conn,$sql)){
        move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
        header('Location:staff.php');
    }else{
        //echo 'Connection error' .mysqli_error($conn);
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
                    <h5 class="text-center text-light">Edit Employee </h5>
                </div>
                <div class="card-body bg-dark">

                    <?php //Fetching Existing Content according to our
                        $sql = "SELECT * FROM staffs WHERE id = '".$urlId."'";
                        $results = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($results);
                    ?>
                    <form action="editStaff.php?id=<?php echo $urlId?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white registerIcons"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control" type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>"  placeholder="First Name">
                                <input class="form-control ml-2" type="text" name="last_name" value="<?php  echo htmlspecialchars($row['last_name']); ?>" placeholder="Last Name" >
                            </div>
                            <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['firstName'] ?></div>
                            <div class="red-text" style="color:red;"> <?php if(strlen($errors['lastName']) < 25){echo $errors['lastName']; } ?> </div>

                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-envelope""></i></span>
                                </div>
                                <input class="form-control " type="text" name="email" value="<?php echo htmlspecialchars($row['email']);?>"  placeholder="Email">
                            </div>
                            <div class="red-text" style="color:red;"> <?php echo $errors['email'] ?> </div>
                        </div>

                        <div class="form-group">
                            <span class="">Previous added role at work: </span>
                            <?php echo $row['role']; ?> <br>
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white  registerIcons"><i class="fas fa-briefcase""></i></span>
                                <select class="form-control" name="role" id="role" >
                                    <option value=""  disabled selected>Select Role at Work</option>
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
                                <input class="form-control " type="text" name="work_from" value="<?php echo htmlspecialchars($row['work_from']); ?>"  placeholder="Work From">
                            </div>
                            <div class="red-text" style="color:red;"> <?php echo $errors['workFrom'];?></div>
                        </div>


                        <div class="form-group">
                            <span class="Fieldinfo"> Existing Image : </span>
                            <img class="mb-2" src="uploads/<?php echo $row['image']; ?>" width="100px"; height="60px"; alt="">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" name="Image" id="imageSelect" value="<?php $row['image'] ?>">
                                <label for="imageSelect" class="custom-file-label"> Select Image</label>
                                <!-- for= and also id= of input need to be equal -->
                            </div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control"  name="info" cols="80" rows="5" value="<?php echo $row['info'];?>" placeholder="Basic information about employee (ex:education...)"><?php echo $row['info'];?></textarea>
                            <div class="red-text" style="color:red;"> <?php echo $errors['info'];?></div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Edit Employee"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

