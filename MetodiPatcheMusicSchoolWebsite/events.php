<?php
include ("includes/DB.php");
?>
<?php

$sql = "SELECT * FROM events";
$result = mysqli_query($conn,$sql);
$events = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM events WHERE id='".$id_to_delete."'";
    if(mysqli_query($conn,$sql)){
        header('Location: events.php');
    }else{
        echo "query error".mysqli_error($conn);
        header('Location:errorPage.php');
    }
}
?>
<?php include ('templates/header.php'); ?>


<!--Events -->
<section style="background-color: #F5F6FA">
<div class="container mt-4 mb-5" style="margin-bottom: 2%">
    <div class="row"  style="padding-left: 10%; padding-right: 10%;  font-family: 'Montserrat', sans-serif;font-weight: 500;">
        <?php foreach ($events as $event){ ?>
        <a href="fullEvent.php?id=<?php echo $event['id'];?>">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <img class="align-content-center mt-3 eventImage" src="uploads/<?php echo $event['image'];?>" alt="">
        </a>
        <h5 class="mt-3 mb-2 eventTitle"><?php echo $event['title'];?></h5>
        <div class="mb-2 eventInfo">by Admin <span class="mr-2 ml-2" style="border-left:1px solid #cccccc;"></span>
            <?php echo $event['datetime'];?><span class="ml-2 mr-2" style="border-left:1px solid #cccccc;"></span> News </div>
        <p class="eventParagraph"><?php if(strlen($event['text'])>50){
                $Text = substr($event['text'],0,40);
                echo $Text."...";
            }else{
                echo $event['text'];
            } ?> </p>
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
            <button class="eventEditButton float-left align-content-center btn btn-outline-success text-success mt-2 ml-4 mr-4 mb-3 eventEditButton " onclick="window.location.href='editEvent.php?id=<?php echo $event['id']; ?>'"><i class="fas fa-edit"></i></button>
            <form class="" action="events.php" method="post">
                <input type="hidden" name="id_to_delete" value="<?php echo $event['id']; ?>" >
                <button class="eventDeleteButton btn btn-outline-danger text-danger mt-2 mb-3 eventDeleteButton" type="submit" name="delete"><i class="fas fa-trash"></i></button>
            </form>
        <?php } else{}?>
        </div>
            <?php } ?>
    </div>

</div>
</section>
<?php include ('templates/footer.php'); ?>
