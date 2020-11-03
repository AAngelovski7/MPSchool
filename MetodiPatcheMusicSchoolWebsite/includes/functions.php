<?php

function SuccessMessage(){
    if(isset($_SESSION["success"])){ //from categories page
        $Output = "<div class=\"alert alert-success text-center mt-5\" style='margin-bottom: unset'>";
        $Output .= htmlentities($_SESSION["success"]);
        $Output .= "</div>";
        $_SESSION["success"]= null; //at the end clear the seesion
        return $Output;
    }
}


function LogOutMessage(){
    if(isset($_SESSION['logout'])){ //from categories page
        $Output = "<div class=\"alert alert-success text-center mt-5\" style='margin-bottom: unset'>";
        $Output .= htmlentities($_SESSION['logout']);
        $Output .= "</div>";
        $_SESSION['logout']= null; //at the end clear the seesion
        return $Output;
    }
}

function ThankYouMessage(){
    $Output = "<div class=\"alert alert-success text-center mt-5\" style='margin-bottom: unset'>";
    $Output .= "Thank You. Your form was succesfully sent.";
    $Output .= "</div>";
    return $Output;
}

?>
