<?php include ("includes/DB.php"); ?>

<?php
$name= $filename='';
$errors = array('name'=>'');
//check if form is submitted
if (isset($_POST['submit']))
{ if(isset($_POST['name'])){
    if(empty($_POST['name'])){
        $errors['name'] = "Внесете го насловот на документот";
    }else{
        $name = $_POST['name'];
        if(strlen($name) < 6 && strlen($name) !=0){
            $errors['name']="Најмалку користете 6 карактери";
        }else if(strlen($name) > 50){
            $errors['name'] = "Махимум користете 50 карактери";
        }
    }
    $filename = $_FILES['file1']['name'];

    if(array_filter($errors)){
        //errors
    }else{

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from files';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/files/';
                
            
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO files(filename, created, name) VALUES('$filename', '$created','$name')";
            mysqli_query($conn, $sql);
            header("Location: files.php?st=success");
        }
        else
        {
            header("Location: files.php?st=error");
        }
    }
}
}
}
?>




<?php include ('templates/header.php'); ?>

<div class="container registerContainer mt-4">
        <div class="row">
            <div class="offset-3"></div>
            <div class="col-lg-6">
                <div class="card  text-light" style="background-color: #F51927">
                    <div class="card-header registerFormHeader">
                        <h5 class="text-center text-light">Додадете Нов Настан </h5>
                    </div>
                    <div class="card-body bg-dark">
                    <form action="addNewFile.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white  registerIcons"><i class="fas fa-briefcase"></i></span>
                                </div>
                                <input class="form-control<?php if( $errors['name']){echo 'formControlError';}?> " type="text" name="name" value="<?php echo htmlspecialchars($name);?>"  placeholder="Наслов на документот">
                            </div>
                            <div class="red-text" style="color:red;"> <?php echo $errors['name'] ?> </div>
                        </div>

                    <legend>Одбери документ кој сакаш да го прикачиш:</legend>
                    <div class="form-group">
                    <input type="file" name="file1" value="<?php echo $filename;?>" required  />
                 </div>
                <div class="form-group">
                <input type="submit" name="submit" class="btn btn-block text-light font-weight-bold " style="background-color: #F51927" value="Додадете нов документ"/>                </form>
       
        </div>
</div>
</div>
</div>
</div>
</div>

<?php include ('templates/footer.php'); ?>
