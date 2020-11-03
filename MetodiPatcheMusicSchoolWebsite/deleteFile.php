<?php
include ('includes/DB.php');
include ("templates/header.php");



if(isset($_GET['id'])){
    $SearchQueryParameter = $_GET['id'];

    $sql = "DELETE FROM files  WHERE id='$SearchQueryParameter'";
    unlink($_GET["filename"]);


    if(mysqli_query($conn,$sql)){
        echo("<script>location.href = 'files.php';</script>");
    }else{
        echo "query error".mysqli_error($conn);
        header('Location:errorPage.php');
    }
}
?>
