<?php
include ("includes/DB.php");
$name = $subject = $email = '';
$errors = array('email'=>'','name'=>'','subject'=>'');
if(isset($_POST['submit'])){

//email validation  name=email
    if(empty($_POST['email'])){
        $errors['email'] = "Емаил адресата е задолжителна";
    }else {
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Внесете валидна емаил адреса";
        }
    }
//name validation name=name
    if(empty($_POST['name'])){
        $errors['name'] ="Името е задолжително";
    }else {
        $name = $_POST['name'];
        if(!preg_match('/^[а-жА-Жa-zA-Z\s].{2,}+$/',$name)){
            $errors['name'] = "Внесете валидно име (минимална должина од 3 карактери, само букви и празно место)";
        }
    }
//subject validation name=subject
    if(empty($_POST['subject'])){
        $errors['subject'] ="Предметот е задолжителен";
    }else {
        $subject = $_POST['subject'];
        if(!preg_match('/^[a-zA-Za-zA-Z\s]+$/',$subject)){
            $errors['subject'] = "Внесете валидно име на предметот (само букви и празно место";
        }
    }

    if(array_filter($errors)){
        //errors
    }
    else {
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mailTo = "antonioangelovski19@gmail.com";
        $headers = "From  ".$mailFrom;
        $txt = $headers."\n\n You have received an e-mail from: " .$name."\n\nMessage content: ".$message;

       if(mail($mailTo,$subject,$txt,$headers)){
           $sql = "INSERT INTO contacts (name,email,subject,message) VALUES ('".$name."','".$mailFrom."','".$subject."','".$message."')";
           $result = mysqli_query($conn,$sql);
           header("Location: contact.php");
//           echo ThankYouMessage();
       }else{
       }
    }
}
?>
<?php
include ("templates/header.php");
?>

<section class="center grey-text contactContainer" >
    <div class="container contactContainer">
        <div class="row">
          <div class="col-lg-1"></div>
            <div class="col-lg-6 contact">
                <h2 class="center" style = " margin-top: 15px;">Бидете во контакт</h2>
                <br><br>
                <form class="" action="contact.php" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white contactIcons bg-dark"><i class="fas fa-user"></i></span>
                            </div>
                            <input class="form-control <?php if( $errors['name']){echo 'formControlError';}?>" type="text" name="name" value="<?php echo   htmlspecialchars($name); ?>"  placeholder="Внесете го вашето име">
                        </div>
                        <div class="red-text" style="color:red;"> <?php  echo $errors['name']; ?> </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white contactIcons bg-dark"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input class="form-control <?php if( $errors['email']){echo 'formControlError';}?>"  type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Внесете ја вашата емаил адреса" >
                        </div>
                        <div class="red-text" style="color:red;"> <?php  echo $errors['email']; ?>   </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-white contactIcons bg-dark"><i class="fas fa-question"></i></span>
                            </div>
                            <input class="form-control <?php if( $errors['subject']){echo 'formControlError';}?>"  type="text" name="subject" value="<?php echo  htmlspecialchars($subject); ?>" placeholder="Внесете го предмето" >
                        </div>
                        <div class="red-text" style="color:red;"> <?php  echo $errors['subject']; ?>  </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control"  name="message" cols="80" rows="5" value="<?php echo  htmlspecialchars($message); ?>" placeholder="Напишете порака..."></textarea>
                    </div>

                    <input type="submit" name="submit" class="btn btn-block contactSubmitBtn text-light font-weight-bold bg-dark" value="Прати"/>

                </form>
            </div>

            <div class="col-lg-4 contactInfo ">
                <h2  style = " margin-top: 15px;">Контакт</h2>
                <br><br>

                <p><i class="bg-dark  text-light fas fa-map-marker-alt icon mr-2"></i>ул. Никола Карев бр.4 - Охрид Република Македонија</p>
                <br>
                <p><i class="bg-dark  text-light fas fa-phone-alt icon mr-2"></i>046/269-139</p>
                <br>
                <p> <i class="bg-dark  text-light fas fa-envelope icon mr-2"></i>metodipatce@yahoo.com</p>
            </div>

        </div>
    </div>
</section>
<?php
include ("templates/footer.php");
?>
