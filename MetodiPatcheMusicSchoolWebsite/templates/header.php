<?php
include_once ('includes/DB.php');

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$activePage = $segments[sizeof($segments)-1];

$startTime = 70000;
$endTime = 160000;
$currentTime = (int) date('Gis');
$currentDay = date("w");
if($currentDay == 0 || $currentDay == 6){
    $stat="ЗАТВОРЕНО";
}else {
    if ($currentTime > $startTime && $currentTime < $endTime)
    {
        $stat="ОТВОРЕНО";
    }
    else
    {
        $stat="ЗАТВОРЕНО";
    }
}
?>
<!DOCTYPE html>
<html lang="mk-MK" >
<head>
    <title>Основно музичко училиште - „Методи Патче“</title>
    <meta charset = "utf-8" />
    <link rel="icon" href="images/favicon/logo-transparent.ico" type="image/ico">
    <!-- External stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="css/contactStyle.css">
    <!-- Font Awesome Styleshhet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" integrity="sha384-wxqG4glGB3nlqX0bi23nmgwCSjWIW13BdLUEYC4VIMehfbcro/ATkyDsF/AbIOVe" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet">
    <!--    Bootstrap stylesheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-circle-up"></i></button>

<!-- Nav Bar -->
<div class="sticky-top">
<section id="header" style="background-color: white" >
    <div class="container header-info-container  " >
        <div class="row">
            <div class="col-lg-4 ">
                <img class="logo-img" src="images/logo.jpg" alt="">
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="header-info-col">
                    <div> <span> <i class="far fa-clock header-icons fa-2x"></i> </span> </div>
                    <div>
                        <span class="header-info-time">Понеделник-Петок 7:00-16:00 <br> Сабота-Недела ЗАТВОРЕНО</span> <br><br>
                       <strong> <div class="text-center"> <?php echo $stat; ?>  </div></strong>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 d-none d-lg-block ">
               <div class="header-info-col">
                  <div> <span> <i class="fas fa-map-marker-alt header-icons fa-2x"></i> </span> </div>
                    <div>
                    <span class="header-info-location">ул. Никола Карев бр.5- Охрид <br> Република Македонија</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"> </div>
        </div>
    </div>



<div class="navigation-bar ">
    <!-- Navbar Start-->
    <div style="height:10px; background:#F51927"> </div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark  ">
        <div class="container">
            <?php
            if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
            <?php }  else{?>
            <a class="navbar-brand" href="index.php" style="font-size: 1.5rem;">Најдоброто Музичко училиште</a>
        <?php } ?>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapseCMS">
                <ul class="navbar-nav">
                    <li class="nav-item <?php if($activePage == 'index.php') echo 'active'; ?> ">
                        <a class="nav-link text-light " href="<?php echo 'index.php';?>" >Почетна</a>
                    </li>

                    <li class="nav-item <?php if($activePage == 'staff.php') echo 'active'; ?>">
                        <a class="nav-link text-light" href="<?php echo 'staff.php';?>">Нашиот тим</a>
                    </li>

                    <li class="nav-item <?php if($activePage == 'events.php') echo 'active'; ?>">
                        <a class="nav-link text-light" href="<?php echo 'events.php';?>">Настани</a>
                    </li>

                    <li class="nav-item <?php if($activePage == 'files.php') echo 'active'; ?>">
                        <a class="nav-link text-light" href="<?php echo 'files.php';?>">Документи</a>
                    </li>

                    <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
                            
                       <?php }
                    ?>

                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
                    <li class="nav-item <?php if($activePage == 'contacts.php') echo 'active'; ?> ">
                        <a class="nav-link text-light" href="<?php echo 'contacts.php';?>">Контакти</a>
                    </li>

                    <li class="nav-item <?php if($activePage == 'addNewStaff.php') echo 'active'; ?> ">
                                 <a class="nav-link text-light" href="<?php echo 'addNewStaff.php';?>">Нов Вработен</a>
                            </li>

                        <li class="nav-item <?php if($activePage == 'addNewEvent.php') echo 'active'; ?> ">
                            <a class="nav-link text-light" href="<?php echo 'addNewEvent.php';?>">Нов настан</a>
                        </li>

                        <li class="nav-item <?php if($activePage == 'addNewFile.php') echo 'active'; ?> ">
                                 <a class="nav-link text-light" href="<?php echo 'addNewFile.php';?>">Нов Документ</a>
                            </li>

                        <li class="nav-item <?php if($activePage == 'comments.php') echo 'active'; ?> ">
                            <a class="nav-link text-light" href="<?php echo 'comments.php';?>">Коментари</a>
                        </li>

                    <?php }
                        else{ ?>
                    <li class="nav-item <?php if($activePage == 'contact.php') echo 'active'; ?> ">
                        <a class="nav-link text-light" href="<?php echo 'contact.php'?>">Контакт</a>
                    </li>
                       <?php }
                    ?>
                   </ul>
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown ml-5">
                        <a class="nav-link dropdown-toggle text-light " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Акции</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if(!isset($_SESSION['username'])){?>
                                <a class="dropdown-item" href="<?php echo 'login.php';?>">Најави се</a>
                                <a class="dropdown-item" href="<?php echo 'register.php';?>">Регистрирај се</a>
                            <?php }?>
                            <?php if(isset($_SESSION['username'])){?>
                                <form  action="logout.php" method="post">
                                    <button name="logOutButton" class="dropdown-item btn btn-link">Одјави се</button>
                                </form>
                            <?php }?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height:10px; background:#F51927;"> </div>
    </div>
</section>
</div>