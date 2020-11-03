<?php
// initializing variables
$username = "";
$email    = "";
$password="";
$errors = array('email'=>'','username'=>'','password'=>'','confirmPassword'=>'', 'emptyPassword'=>'',);
$loginErrors = array('password'=>'','username'=>'','wrongCredentials'=>'');

if (isset($_POST['submit'])) {
// receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // form validation: ensure that the form is correctly filled ...
    if (empty($username)) {
        $errors['username'] ="Username is required";
    }else{
        if(strlen($username) <6){
            $errors['username'] ="Username must be at least 5 characters";
        }
        else if(!preg_match('/^[a-zA-Z0-9]+$/',$username)){
            $errors['username'] = "Enter valid Name (only letters and numbers)";
        }
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    }else {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Enter valid email";
        }
    }
    if (empty($password)) {
        $errors['emptyPassword'] = "Password is required";
    }else {
        if(strlen($password)<6){
            $errors['password']='The length should be at least 6 characters';
        }
    }
    if(empty($confirmPassword) && strlen($errors['password'])==0 && strlen($errors['emptyPassword'])==0){
        $errors['confirmPassword'] = "Confirm the password";
    }else if ($password != $confirmPassword && strlen($errors['password'])==0) {
        $errors['confirmPassword'] = "The two passwords do not match";
    }


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errors['username'] = "Username already exists";
        }

        if ($user['email'] === $email) {
            $errors['email'] = "email already exists";
        }
    }
    if(array_filter($errors)){
        //errors
    }else{
        $enciptedPassword = md5($password);
        $query = "INSERT INTO users (username,email,password) VALUES('$username','$email','$enciptedPassword')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }

}

// LOGIN USER
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        $loginErrors['username'] = "Username is required";
    }
    if (empty($password)) {
        $loginErrors['password']= "Password is required";
    }

    if (array_filter($loginErrors)) {
        //errors;
    }
    else{
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['success'] = "You are now logged in";
            echo("<script>location.href = 'index.php';</script>");
        }else {
           $loginErrors['wrongCredentials']= "Wrong username/password combination";
       }
    }
}
