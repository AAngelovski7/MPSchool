
<?php
include ('includes/DB.php');
include ("templates/header.php");
include("includes/functions.php");

?>
<div id="statusReporting" style="padding-right: 30%;padding-left: 30%">
    <?php
    echo SuccessMessage();
    echo LogOutMessage();
    ?>
</div>

<!--Carousel Start-->
<div class="container">
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/carouselImg2.jpg" alt="Guitar" width="1100" height="500">
            <div class="carousel-caption">
                <h1 class="carouselHeaderInfo">Имаме цел</h1>
                <h5 class="carouselHeaderInfo">да создадеме личности кои ке уживаат во музиката</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/carouselImg1.jpg" alt="Piano" width="1100" height="500">
            <div class="carousel-caption">
                <h1 class="carouselHeaderInfo">Имаме задача</h1>
                <h5 class="carouselHeaderInfo">да создадеме личности кои ке уживаат во музиката</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/carouselImg3.jpg" alt="Violin" width="1100" height="500">
            <div class="carousel-caption">
                <h1 class="carouselHeaderInfo">Имаме знаење</h1>
                <h5 class="carouselHeaderInfo">да ѓи научиме учениците слободно и самоуверено да музиционираат</h5>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev carouselArrowPrew" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next carouselArrowNext" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
</div>
<!--Carousel End-->

<!-- Instruments Info Start-->
<section id="instrumentsInfo" >
    <div class="container-fluid bg-dark mt-5 instrumentContainer">
<!--        <h2 class="align-content-center text-light pt-3" style="text-align: center"> Music Classes</h2>-->
        <div class="row instrumentRow">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
              <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">1</div>
                <h3 class="text-light instrumentName">Пиано</h3>
                <img class="align-content-center mt-3" src="images/instruments/pianoInstrument.JPG" alt="">
                <div class="text-light instrumentInfoText"> It is a musical instrument played using a keyboard.</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
                <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">2</div>
                <h3 class="text-light">Виолина</h3>
                <img class="align-content-center mt-3" src="images/instruments/violinInstrument.JPG" alt="">
                <div class="text-light instrumentInfoText"> The violin has four strings tuned in perfect fifths.</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
                <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">3</div>
                <h3 class="text-light">Гитара</h3>
                <img class="align-content-center mt-3" src="images/instruments/guitarInstrument.JPG" alt="">
                <div class="text-light instrumentInfoText">Learn to play the world’s popular instrument with our guitar classes.</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
                <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">4</div>
                <h3 class="text-light">Кларинет</h3>
                <img class="align-content-center mt-3" src="images/instruments/clarinetInstrument.JPG" alt="">
                <div class="text-light instrumentInfoText">The clarinet is a woodwind instrument.</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
                <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">4</div>
                <h3 class="text-light">Флејта</h3>
                <img class="align-content-center mt-3" src="images/instruments/fluteInstrument.jpg" alt="">
                <div class="text-light instrumentInfoText">A person who plays a flute is called flautist, be the next one.</div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3 instrumentCol">
                <div class="text-light mr-3 instrumentNumbers align-content-center"  style="float:left;">4</div>
                <h3 class="text-light">Хармоника</h3>
                <img class="align-content-center mt-3" src="images/instruments/accordionInstrument.jpg  " alt="">
                <div class="text-light instrumentInfoText">Maybe the easiest to learn. Try it!</div>
            </div>
        </div>
    </div>
</section>
<!-- Instruments Info End-->


<!-- Features Section Start -->
<section id="features" style="font-family: 'Montserrat', sans-serif;font-weight: 500;">
    <div class="row  container">
        <div class="col col-lg-4 col-md-12 col-sm-12 col-12  featureBox">
            <i class="fas fa-check-circle fa-4x featuresIcon"></i>
            <h3 class="featureHeading">Лесно прилагодување</h3>
            <p class="featuresParagraph">Учениците лесно ке се прилагодат на предавањата бидејќи се лесни и интересни за следење.</p>
        </div>

        <div class="col col-lg-4 col-md-12 col-sm-12 col-12 featureBox">
            <i class="fas fa-bullseye fa-4x featuresIcon"></i>
            <h3 class="featureHeading">Одличен наставен кадар</h3>
            <p class="featuresParagraph">Ги имаме најдобрите музички професори во околината и пошироко.</p>
        </div>

        <div class="col col-lg-4 col-md-12 col-sm-12  col-12  featureBox">
            <i class="fas fa-heart fa-4x featuresIcon"></i>
            <h3 class="featureHeading">Гарантирана работа</h3>
            <p class="featuresParagraph">Професорите ќе дадат се од себе за вашето дете да биде успеешно и да напредува </p>
        </div>
    </div>
</section>
<!--Features Section End-->

<!--About School Section Start-->
<section id="AboutSchoolRevards" style="background-image: url('images/aboutSchoolBackgroudn.JPG'); min-height: 400px;   background-repeat: no-repeat;">
    <div class="container" style="font-family: 'Montserrat', sans-serif;
    font-weight: 500;">
        <h5 class="text-center text-light pt-5 pb-4 schoolRevardHeader"> Основно Музичко Училиште - „Методи Патче“</h5>
        <p class="text-center text-light pb-4" style="padding-left: 20%; padding-right: 20%; font-size: 0.6em">Имаме талентирани и искусни Професори кои предаваат пијано, виолина, гитара, флејта, хармоника и кларинет.</p>
        <div class="row text-light text-center" style="padding-right: 13%; padding-left: 13%">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <i class="fas fa-trophy align-content-center mb-4"></i>
                <div class="mb-3">12</div>
                <div style="font-size: 0.7em;">Интернационални награди</div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <i class="fas fa-music align-content-center mb-4"></i>
                <div class="text-center mb-3">235</div>
                <div style="font-size: 0.7em;">Задоволни ученици</div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <i class="far fa-star align-content-center mb-4"></i>
                <div class="text-center mb-3">50</div>
                <div style="font-size: 0.7em;">Години на посоење</div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <i class="fas fa-user-friends align-content-center mb-4"></i>
                <div class="text-center mb-3">20</div>
                <div style="font-size: 0.7em;">Успешни Професори</div>
            </div>

        </div>
    </div>
</section>
<!--About School Section End-->



<?php
include ("templates/footer.php");
?>



