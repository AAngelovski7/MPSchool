<?php
include ("includes/DB.php");

// fetch files
$sql = "select * from files";
$result = mysqli_query($conn, $sql);


?>
<?php include ('templates/header.php'); ?>




<div class="container">
    <div class="row">
       
            <?php if(isset($_GET['st'])) { ?>
                <div class="">
                <?php if ($_GET['st'] == 'success') {
                       // echo "File Uploaded Successfully!";
                    }
                    else
                    {
                        //echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>


<!-- Novo -->
<section class="py-3 px-5 mb-4">
   <div class="row">
      <div class="col-lg-12">
         <table class="table table-striped table-hover">
            <thead class="thead-dark">
               <tr>
                  <th>#</th>
                  <th>Име на документот</th>
                  <th>Документ</th>
                  <th>Прегледај</th>
                  <th>Зачувај</th>
                  <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
                   <th>Избриши</th>
                  <?php } ?>
                  <th>Датум</th>
               </tr>
            </thead>
             <tbody>
             <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { 
                    ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['filename'];?></td>
                    <td><a href="uploads/files/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="uploads/files/<?php echo $row['filename']; ?>" download>Download</td>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
                    <td><a class="btn btn-danger" href="deleteFile.php?id=<?php echo $row['id'];?>&filename=uploads/files/<?php echo $row['filename'];?>"><i class="fas fa-trash"></i></a></td>
                    <?php } ?>
                    <td><?php echo $row['created'];?></td>
                </tr>
                <?php } ?>
             </tbody>
         </table>
      </div>
   </div>
</section>



<?php include ('templates/footer.php'); ?>
