<?php
include ('includes/DB.php');
include ("templates/header.php");
?>



<div class="container py-2 mb-4">
    <div class="row" style="min-height: 30px;">
        <div class="col-lg-12" style="min-height: 400px">
            <?php
              $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
              $result = mysqli_query($conn,$sql);
              $num_rows = mysqli_num_rows($result);
              if($num_rows == 0){
               //empty
              }else{?>
            <h2>Забранети Коментари</h2>

            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Број</th>
                        <th>Име</th>
                        <th>Датум</th>
                        <th>Коментар</th>
                        <th>Дозволи</th>
                        <th>Избриши</th>
                    </tr>
                </thead>
                <?php $sql = "SELECT * FROM comments WHERE status='OFF'";
                        $result = mysqli_query($conn,$sql);
                        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        $srNo = 0;
                        foreach ($rows as $row){
                            $CommentId=$row['id'];
                            $DateTimeOfComment = $row['datetime'];
                            $CommenterName = $row['name'];
                            $CommentContent = $row['comment'];
                            $CommenterPostId= $row['event_id'];
                            if(strlen($CommenterName)>10){
                                $CommenterName=substr($CommenterName,0,10)."...";
                            }
                            if(strlen($DateTimeOfComment)>11){
                                $DateTimeOfComment=substr($DateTimeOfComment,0,11)."...";
                            }
                            ?>
                <tbody>
                <tr>
                    <td><?php echo ++$srNo; ?></td>
                    <td><?php echo htmlentities($CommenterName) ; ?></td>
                    <td><?php echo htmlentities( $DateTimeOfComment); ?></td>
                    <td  ><?php echo htmlentities($CommentContent); ?></td>
                    <td ><a class="btn btn-success" href="approveComment.php?id=<?php echo $CommentId; ?>"><i class="fas fa-check-circle"></i></a></td>
                    <td><a class="btn btn-danger" href="deleteComment.php?id=<?php echo $CommentId; ?>"><i class="fas fa-trash"></i></a></td>
                </tr>
                </tbody>
                <?php } ?>
            </table>
              <?php }
            $sql = "SELECT * FROM comments WHERE status='ON'";
            $result = mysqli_query($conn,$sql);
            $num_rows_OFF = mysqli_num_rows($result);
            if($num_rows_OFF == 0){
                //empty
            }else{
              ?>

            <h2>Дозволени Коментари</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Број.</th>
                    <th>Име</th>
                    <th>Датум</th>
                    <th>Коментар</th>
                    <th>Забрани</th>
                    <th>Избриши</th>
                </tr>
                </thead>
                <?php $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
                $result = mysqli_query($conn,$sql);
                $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $srNo = 0;
                foreach ($rows as $row){
                    $CommentId=$row['id'];
                    $DateTimeOfComment = $row['datetime'];
                    $CommenterName = $row['name'];
                    $CommentContent = $row['comment'];
                    $CommenterPostId= $row['event_id'];
                    if(strlen($CommenterName)>10){
                        $CommenterName=substr($CommenterName,0,10)."...";
                    }
                    if(strlen($DateTimeOfComment)>11){
                        $DateTimeOfComment=substr($DateTimeOfComment,0,11)."...";
                    }
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo ++$srNo; ?></td>
                        <td><?php echo htmlentities($CommenterName) ; ?></td>
                        <td><?php echo htmlentities( $DateTimeOfComment); ?></td>
                        <td  ><?php echo htmlentities($CommentContent); ?></td>
                        <td ><a class="btn btn-warning text-light" href="disApproveComment.php?id=<?php echo $CommentId; ?>"><i class="fas fa-minus-circle"></i></a></td>
                        <td><a class="btn btn-danger " href="deleteComment.php?id=<?php echo $CommentId; ?>"> <i class="fas fa-trash"></i> </a></td>
                    </tr>
                    </tbody>
                <?php }  ?>

            </table>
<?php } ?>

        </div>
    </div>
</div>




















<?php  include_once ('templates/footer.php')?>
