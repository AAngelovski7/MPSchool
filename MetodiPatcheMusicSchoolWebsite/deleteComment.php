<?php
include ('includes/DB.php');
include ("templates/header.php");



if(isset($_GET['id'])){
    $SearchQueryParameter = $_GET['id'];

    $sql = "DELETE FROM comments  WHERE id='$SearchQueryParameter'";


    if(mysqli_query($conn,$sql)){
        echo("<script>location.href = 'comments.php';</script>");
    }else{
        echo "query error".mysqli_error($conn);
        header('Location:errorPage.php');
    }
}
?>
