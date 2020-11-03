<?php
include('includes/DB.php');

$SearchQueryParameter = $_GET['id'];

$sql = "SELECT * FROM events where id='$SearchQueryParameter'";
$result = mysqli_query($conn,$sql);
$event = mysqli_fetch_assoc($result);
$errors = ['name'=>'','comment'=>''];
$Name = $Comment = "";
if(isset($_POST['submit'])){
    $Comment = $_POST['CommenterThoughts'];


     if(isset($_POST['CommenterName'])){
        if(empty($_POST['CommenterName'])){
        $errors['name'] = 'Името е задолжително';
        }else {
            $Name = $_POST['CommenterName'];
            if(!preg_match("/^[А-ЖA-Zа-жa-z]+/",$Name)){
                $errors['name'] = "Невалиден формат (користи само букви и празни места).";
            }
        }
    }
    if(isset($_POST['CommenterThoughts'])){
        if(empty($_POST['CommenterThoughts'])){
            $errors['comment'] = "Коментарот е задолжителен";
        }else{
            if(strlen($Comment) < 30 && strlen($Comment) !=0){
                $errors['comment']="Минимум 30 карактери";
            }
        }
    }


    if(array_filter($errors)){
        //errors
    }else{
        $Name = mysqli_real_escape_string($conn,$_POST['CommenterName']);
        $Comment = mysqli_real_escape_string($conn,$_POST['CommenterThoughts']);
        date_default_timezone_set('Europe/Skopje');
        $CurrentTime = time();
        $DateTime = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
        $sql = "INSERT INTO comments (name,comment,datetime,approvedby,status,event_id) VALUES ('$Name','$Comment','$DateTime','Pending','OFF','$SearchQueryParameter')";

        if(mysqli_query($conn,$sql)){
            echo("<script>location.href = 'fullEvent.php?id='.$SearchQueryParameter;</script>");

        }else{
            echo 'Connection error' .mysqli_error($conn);
            header('Location:errorPage.php');
        }
    }


}
?>
<?php include('templates/header.php') ?>;




<!--new added-->
<div class="container">
    <div clas="row mt-4">
        <div class="col-lg-8 col-sm-8 col-sm-8 float-left">
            <div class="card">
                <img class="img-fluid card-img" src="uploads/<?php  echo $event['image']?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"> <?php echo$event['title'] ?> </h4>
                    <small class="text-muted"> Event
                        Writen by <span class="text-dark"> <?php echo $event['autor'] ?> </span>
                        On <?php echo $event['datetime'] ?>
                    </small>
                    <hr>
                    <p class="card-text">
                        <?php echo $event['text'] ?>
                    </p>
                </div>
            </div>

            <div class="mb-3"></div>
            <?php
            $sql= "SELECT * FROM comments WHERE event_id='".$SearchQueryParameter."' AND status = 'ON'";
            $result = mysqli_query($conn,$sql);
            $comments = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $num_rows = mysqli_num_rows($result);
            if($num_rows == 0 || $num_rows <0){ ?>
                <span style="color: #0E1B36">No Comments yet</span>
            <?php }else if($num_rows >0){
                ?>
                <span style="color: #0E1B36">Comments:</span>
            <div style="height: 300px; overflow-y:scroll">
                <?php } ?>
            <?php  foreach ($comments as $comment){ ?>
                <div class="mt-3">
                    <div class="media">
                        <img class="d-block img-fluid align-self-start rounded-circle" src="images/comment.png" alt="" >
                        <div class="media-body ml-2">
                            <h6 class="lead"><?php echo $comment['name'] ?></h6>
                            <p class="small"><?php echo $comment['datetime']?> </p>
                            <p> <?php echo $comment['comment'] ?></p>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>
            </div>

            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ } else{?>
                <form action="fullEvent.php?id=<?php echo $SearchQueryParameter; ?>" method="POST">
                    <div class="card my-3">
                        <div class="card-header">
                            <h5 clas="comentInfo"style="color:black;"> Write Comment</h5>
                        </div>
                        <div class="card-body">
                            <div clas="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                                    </div>
                                    <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="<?php if(isset($_SESSION['username'])){
                                        echo $_SESSION['username']; } else{
                                        echo $Name;
                                    } ?>">
                                    <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['name'] ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="CommenterThoughts" id="" cols="60" rows="2" placeholder="Write Comment here" ><?php echo $Comment; ?></textarea>
                                <div class="red-text float-left mr-4" style="color: red;"> <?php echo $errors['comment'] ?></div>

                            </div>
                            <div class="">
                                <button class="btn btn-sm text-light " type="submit" name="submit" style="background-color: #0E1B36"> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>




        <div class="col-lg-4 col-md-4 col-sm-4 float-right" >
            <div class="card mt-4">
                <div class="card-body">
                    <img src="images/carouselImg1.JPG" class="d-block img-fluid mb-3" alt="Image of instruments">
                    <div class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header text-light " style="background-color: #F51927">
                    <h2 class="lead">Last Events</h2>
                </div>
                <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM events ORDER BY id desc LIMIT 0,5";
                        $result = mysqli_query($conn,$sql);
                        $lastEvents = mysqli_fetch_all($result,MYSQLI_ASSOC);

                        foreach ($lastEvents as $lastEvent){
                    ?>
                        <div class="media">
                            <img src="uploads/<?php echo $lastEvent['image'];?>"  class="d-block img-fluid align-self-start mb-2" width="110px" style="height:90px" alt="">
                            <div class="media-body ml-2">
                                <a href="fullEvent.php?id=<?php echo $lastEvent['id'];?>"   onMouseOver="this.style.color='#F51927'" ><h6 class="lead"><?php echo $lastEvent['title'];?></h6></a>
                                <p class="small"><?php echo $lastEvent['datetime']; ?></p>
                            </div>
                        </div>
                        <?php  } ?>
                </div>
            </div>
        </div>
   
        </div>
</div>



