<!-- Footer Start -->
<section id="footer">
  <div class="footer-container">
    <div style="height:10px; background:#F51927;"> </div>
    <div class="bg-dark">
        <div class="container-fluid ">
            <div class="row">
                <div class="footer-logo-col col-lg-3 col-md-6 col-sm-12 footer-cols d-none d-md-block">

                    <div class="footer-info-col">
                        <div> <span> <img class="footer-logo" src="images/logo-transparent1.png" style="margin-left: 5%" alt=""></span> </div>
                        <div class="footer-span-div">
                            <span class="footer-info-name" style="font-weight: bold">Основно музичко училиште<br>Методи Патче</span>
                        </div>
                    </div>
                   <div class="footer-info-text">Нашето Музичко училиште е одлична установа за твоето музичко образование. Учи и откри го твојот музички талент со нас!</div>
                    <div class="footer-social-media-holder">
                         <h6  style="color: #fff; font-family: 'Montserrat', sans-serif">Заследете не: </h6>
                        <div>
                            <a class="logoNav" href="<?php echo 'https://www.facebook.com/OMU-Metodi-Patcev-Ohrid-992898710779161/'; ?>"> <img src="images/facebook-logo.png" width="20px" height="20px" alt="" > </a>
                            <a class="logoNav" href="<?php https://www.youtube.com/playlist?list=PLsUgtkPSKmrN_vKw1RjKtRE1q3CSsqBsh ?>"><img src="images/youtube-logo.png" width="20px" height="20px" alt=""> </a>
                            <a class="logoNavMsg " href="mailto:metodipatce@yahoo.com"> <img src="images/envelope-logo.png" width="30px" height="40px" alt=""> </a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6 footer-cols">
                    <h4 class="footer-heading-info" >ЗА НАС</h4>
                    <hr>
                        <ul  type="none" class="footer-nav">
                            <li class="footer-nav-links <?php if($activePage == 'index.php') echo 'active'; ?> ">
                                <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'index.php';?>" >Почетна</a>
                            </li>
                            <li class="footer-nav-links">
                                <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'staff.php';?>">Нашиот тим</a>
                            </li>
                            <li class="footer-nav-links <?php if($activePage == 'events.php') echo 'active'; ?>">
                                <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'events.php';?>">Настани</a>
                            </li>
                            <li class="footer-nav-links <?php if($activePage == 'files.php') echo 'active'; ?>">
                                <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'files.php';?>">Документи</a>
                            </li>

                            <?php
                            if(isset($_SESSION['admin']) && $_SESSION['admin']=='ON'){ ?>
                                <li class="footer-nav-links <?php if($activePage == 'addNewStaff.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'addNewStaff.php';?>">Нов Вработен</a>
                                </li>
                                <li class="footer-nav-links <?php if($activePage == 'addNewEvent.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'addNewEvent.php';?>">Нов настан</a>
                                </li>
                                <li class="footer-nav-links <?php if($activePage == 'addNewFile.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'addNewFile.php';?>">Нов докумнет</a>
                                </li>
                                <li class="footer-nav-links <?php if($activePage == 'contacts.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'contacts.php';?>">Контакти</a>
                                </li>
                                <li class="footer-nav-links <?php if($activePage == 'comments.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'comments.php';?>">Коментари</a>
                                </li>
                            <?php }
                            else{ ?>
                                <li class="footer-nav-links <?php if($activePage == 'contact.php') echo 'active'; ?> ">
                                    <span class="nav-sign mr-3"><i class="fas fa-angle-right"></i></span><a class="footer-nav-anchor" href="<?php echo 'contact.php';?>">Контакт</a>
                                </li>
                            <?php }
                            ?>
                        </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6 footer-cols">
                    <h4 class="footer-heading-info">КОНТАКТ </h4>
                    <hr>
                    <div class="footer-info-col">
                        <div> <span> <i class="footer-icons fas fa-map-marker-alt fa-2x"></i> </span> </div>
                        <div class="">
                            <span class="footer-info-location">ул. Никола Карев бр.4 - Охрид <br>  Република Македонија</span>
                        </div>
                    </div>
                    <div class="footer-info-col">
                        <div> <span> <i class="footer-icons fas fa-phone-alt fa-2x"></i> </span> </div>
                        <div class="footer-span-div">
                            <span class="footer-info-phone">046-269-139</span>
                        </div>
                    </div>
                    <div class="footer-info-col">
                        <div> <span> <i class="footer-icons fas fa-envelope fa-2x"></i> </span> </div>
                        <div class="footer-span-div">
                            <span class="footer-info-email">metodipatche@yahoo.com</span>
                        </div>
                    </div>
                   </div>

                   <div class="col-lg-3 col-md-6 col-sm-12 footer-cols d-none d-md-block">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1503.0192458633235!2d20.80866065805826!3d41.111850415673636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350db58cd150529%3A0xa4a86d22e91f9351!2sPrimary%20Music%20School%20%22Metodi%20Patchev%22!5e0!3m2!1sen!2smk!4v1586683705196!5m2!1sen!2smk" width="280" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   </div>
            </div>
        </div>
        <div class="text-center text-light mt-3" style="font-size: 14px"> <?php echo date("Y"); ?> © Основно Музичко училиште. Сите права се заштитени  </div>
    </div>
  </div>
</section>
<!-- Footer End -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/main.js" type="text/javascript"></script>
</body>
</html>