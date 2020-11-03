<?php
include ('includes/DB.php');
?>


<?php
if(isset($_GET['id'])){
    $SearchQueryParameter = $_GET['id'];

    $sql = "UPDATE comments SET status='ON', approvedby='Admin' WHERE id='$SearchQueryParameter'";
  

  

    if(mysqli_query($conn,$sql)){
        header("Location:comments.php");
    }else{
      //error message
        header('Location:errorPage.php');
    }

}

?>