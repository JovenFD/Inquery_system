<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/logo_inc.png">
    <title>Login | Page</title>
</head>
<body>
    <?php
    include('header.php');

    include('nav.php');
    ?>
    <div class="loginContainer">
        <div class="d-lg-flex position-relative">
            <div class="d-flex logoContainer">
                <div class="polygon1 position-relative">
                    <a href="index.php"><img class="logo" src="img/logo_inc.png" alt="bcp-logo" /></a>
                </div>
                <div class="polygon2"></div>
            </div>
            <div class="form-container d-flex justify-content-center w-100 p-3 p-lg-5">
                <div class="m-auto">
                    <div class="form-header1 ps-2 mb-5">
                        <h1 class="header1 fw-bold fs-1 m-0">HireAssist</h1>
                        <h1 class="header2 fw-bold fs-1 m-0">INQUERY SYSTEM</h1>
                    </div>
                    <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

                        include($page . '.php');

                        include('footer.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>