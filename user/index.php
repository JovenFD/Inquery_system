<?php include('function.php'); pages() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/custom.css" />
    <link rel="stylesheet" href="../css/sidebar.css" />
    <link rel="icon" type="image/x-icon" href="../img/logo_inc.png">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include('../header.php'); ?>
    <style>
        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl {
            max-width: 100% !important;
            padding: 0px !important;
        }

        .topbarChild.d-flex.justify-content-between.align-items-center {
            padding-right: 15px;
        }
        
    </style>
</head>

<body>
    <main class="container-lg container-xl container-xxl">
        <ul class="topbar m-0 list-unstyled">
            <div class="topbarChild d-flex justify-content-between align-items-center">
                <li class="topBarLogo text-dark">
                    <div class="logo-details d-flex align-items-center">
                        <i class="bx bx-menu rounded-circle" id="btn"></i>
                        <img class="ms-2 ms-sm-3 my-auto" src="../img/logo_inc.png" width="35" height="35" alt="bcp-logo" />
                        <div class="logo_name text-dark ms-1 ms-sm-3">HireAssist</div>
                        <div class="my-auto search-boxContainer d-none d-lg-block">
                            <input type="text" class="form-control search-box" type="search" placeholder="Search..." aria-label="Example text with button addon" aria-describedby="button-addon1" />
                        </div>
                    </div>
                </li>
                <div class="d-flex align-items-center justify-content-end">
                    <li>
                        <i class="bx bxs-message-dots fs-4 me-3 mt-1 m-0"></i>
                        <i class="bx bxs-bell fs-4 mt-1 m-0"></i>
                    </li>
                    <li>
                        <div class="nav-item dropdown my-auto ms-4 pr-2">
                            <a id="dropdownmenu" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <h5 class="m-0 d-none d-sm-block"><?php userData('lname');?></h5>
                                <img class="ms-0 ms-sm-3" src="../uploads/<?php userData('u_avatar');?>" width="32" height="32" alt="profile-picture" />
                            </a>
                            <ul class="dropdown-menu border shadow dropdownContainer">
                                <li>
                                    <a class="dropdown-item" href="../logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </div>
            </div>
        </ul>
        <div class="px-0 d-xl-flex position-relative d-flex">
            <div class="sidebar close rounded shadow">
                <ul class="nav-list p-0 m-0">
                    <li class="d-block d-lg-none">
                        <i class="bx bx-search"></i>
                        <input type="text" placeholder="Search..." />
                        <span class="tooltip">Search</span>
                    </li>
                    <li>
                        <a href="index.php" class="<?php echo pages() == '' ? 'active' : '';?>">
                            <i class="fa fa-user"></i>
                            <span class="links_name">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=branches" class="<?php echo pages() == 'branches' ? 'active' : '';?>">
                            <i class="fa fa-building-user"></i>
                            <span class="links_name">branches</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=apt" class="<?php echo pages() == 'apt' ? 'active' : '';?>">
                            <i class="fa fa-calendar"></i>
                            <span class="links_name">Appointment</span>
                        </a>
                    </li>
                </ul>
            </div>

            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';

                include($page . '.php');
            ?>
        </div>
    </main>
    <?php include('../footer.php'); ?>
    <script src="../js/custom.js"></script>
</body>
</html>