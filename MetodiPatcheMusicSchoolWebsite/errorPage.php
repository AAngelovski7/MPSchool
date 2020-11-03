


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet">
    <!--    Bootstrap stylesheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Title</title>
    <style>
        body{
            background-image: url("images/errorPageBackground.JPG");
        }
        .container-fluid{
            margin-top: 20%;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }
        .errNum{
            font-size: 8rem;
            font-weight: 800;
        }
        .sorryMsg{
            font-size: 0.8rem;
            letter-spacing:0.2rem;
        }
        .errStatCode{
            letter-spacing:0.6rem;
        }

    </style>

</head>
<body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-light">
               <div class="errNum">500</div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-light text-left">
                <div  class="mt-5 errStatCode">
                   INTERNAL SERVER ERROR<br></div>
                <div class="mt-3 sorryMsg">Something went wrong at our end. <br> Don`t worry, it is not you - it`s us. <br> Sorry about that </div>

                <button class="btn bg-secondary text-light text-center mt-3" onclick="window.location.href='index.php'">BACK TO HOME PAGE</button>

            </div>
        </div>
    </div>
</body>
</html>


