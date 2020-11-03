<?php
include_once ('includes/DB.php');
?>

<?php
$sql = "SELECT * FROM staffs";
$result = mysqli_query($conn,$sql);
$staffs = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM staffs WHERE id='".$id_to_delete."'";
    if(mysqli_query($conn,$sql)){
        header('Location: staff.php');
    }else{
        echo "query error".mysqli_error($conn);
        header('Location:errorPage.php');
    }
}

?>
<?php include_once ('templates/header.php'); ?>


<section style="background-color: #F5F6FA">
<div class="container pr-5 pl-5 mt-5 " style="font-family: 'Montserrat', sans-serif;font-weight: 500;">
    <h3 class="text-center pt-5" style="color: #0E1B36"><strong>Нашиот Тим</strong></h3>
    <div class="row mt-5" >


        <?php foreach ($staffs as $staff){ ?>
            <div class="offset-1"></div>
        <div class="col-lg-5 col-md-5 col-sm-12 mb-4">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                    <img src="uploads/<?php echo $staff['image']; ?>" alt="" width="170px" height="171px">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                    <h6 class="staffHeader"><?php echo htmlspecialchars($staff['first_name']) ." ".htmlspecialchars($staff['last_name']); ?></h6>
                    <div class="staffRoleInfo text-secondary" ><?php echo htmlspecialchars($staff['role'])?></div>
                    <div class="staffEmail text-secondary"><?php  echo htmlspecialchars($staff['email']);?>
                        <br>
                        Work from:  <?php  echo htmlspecialchars($staff['work_from']);?>
                    </div>
                    <div class="staffInfo text-secondary"><?php  echo $staff['info']?></div>
                    <div class="icon-block">
                        <a href="mailto:<?php echo htmlspecialchars($staff['email']) ?>">
                            <i class=" fas fa-envelope" style="color: #0E1B36"> </i>
                        </a>
                    </div>
                </div>
            </div>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
<!--                <a type="button" href="editStaff.php?id=--><?php //echo $staff['id']; ?><!--"><i class="fas fa-edit text-danger float-left"></i></a>-->
                <button class="float-left btn btn-outline-success text-success mt-2 ml-4 mr-4 mb-3 staffButtonEdit" onclick="window.location.href='editStaff.php?id=<?php echo $staff['id']; ?>'"><i class="fas fa-edit"></i></button>
                <form class="" action="staff.php" method="post">
                    <input type="hidden" name="id_to_delete" value="<?php echo $staff['id']; ?>" >
                    <button class="btn btn-outline-danger text-danger mt-2 mb-3 staffButtonDelete" type="submit" name="delete"><i class="fas fa-trash"></i></button>
                </form>
            <?php } ?>

        </div>
        <?php } ?>

    </div>
</div>
</section>
<?php include_once ('templates/footer.php')?>
