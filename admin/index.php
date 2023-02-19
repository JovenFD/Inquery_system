<?php include('function.php');
pages(); ?>
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

        /* ==========================================================================
   WYSIWYG
   ========================================================================== */
        #editor {
            resize: vertical;
            overflow: auto;
            line-height: 1.5;
            background-color: #fafafa;
            background-image: none;
            border: 0;
            border: 1px solid #6c757d36;
            min-height: 150px;
            box-shadow: none;
            padding: 8px 16px;
            margin: 0 auto;
            font-size: 14px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            border-radius: 6px;
        }

        div#editControls {
            display: flex;
            flex-wrap: wrap;
        }

        @media(max-width: 767px) {
            .card {
                width: 100% !important;
            }
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
                                <h5 class="m-0 d-none d-sm-block"><?php userData('lname'); ?></h5>
                                <img class="ms-0 ms-sm-3" src="../uploads/<?php userData('u_avatar'); ?>" width="32" height="32" alt="profile-picture" />
                            </a>
                            <ul class="dropdown-menu border shadow dropdownContainer">
                                <li>
                                    <a class="dropdown-item" href="index.php?page=update_account">Profile</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
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
                        <a href="index.php" class="<?php echo pages() == '' ? 'active' : ''; ?>">
                            <i class="fa fa-user"></i>
                            <span class="links_name">Admin Account</span>
                        </a>
                    </li>
                    <li class="">
                        <div class="iocn-link arrow">
                            <a class="">
                                <i class="fa-solid fa-list"></i>
                                <span class="links_name">Manage Post</span>
                            </a>
                            <i class="bx bx-chevron-down arrow"></i>
                        </div>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.php?page=branches" class="<?php echo pages() == 'branches' ? 'active' : ''; ?>">
                                    <i class="fa fa-building-user"></i> Branches</a>
                            </li>
                            <li>
                                <a href="index.php?page=positions" class="<?php echo pages() == 'positions' ? 'active' : ''; ?>">
                                    <i class="fa fa-briefcase"></i> Job positions</a>
                            </li>
                            <li><a href="index.php?page=post" class="<?php echo pages() == 'post' ? 'active' : ''; ?>">
                                    <i class="fa fa-paper-plane"></i>Job Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?page=applications" class="<?php echo pages() == 'applications' ? 'active' : ''; ?>">
                            <i class="fa fa-users"></i>
                            <span class="links_name">Applicants</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=apt" class="<?php echo pages() == 'apt' ? 'active' : ''; ?>">
                            <i class="fa fa-calendar"></i>
                            <span class="links_name">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=apt" class="<?php echo pages() == 'apt' ? 'active' : ''; ?>">
                            <i class="fa fa-message"></i>
                            <span class="links_name">Chatbot</span>
                        </a>
                    </li>
                </ul>
            </div>

            <?php
            if($profile['usertype']==2) {
                $page = isset($_GET['page']) ? $_GET['page'] : 'update_account';
            } else {
                $page  = isset($_GET['page']) ? $_GET['page'] : 'home';
            }
            
            include($page . '.php');
            ?>
        </div>
    </main>
    <?php include('../footer.php'); ?>
    <script src="../js/custom.js"></script>
    <script>
        const removeMsg = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to remove!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Remove'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = `../route.php?route=<?php echo $page; ?>&id=${id}`;
                }
            })
        }


        jQuery(document).ready(function($) {
            $('#editControls a').click(function(e) {
                e.preventDefault();
                switch ($(this).data('role')) {
                    case 'h1':
                    case 'h2':
                    case 'h3':
                    case 'p':
                        document.execCommand('formatBlock', false, $(this).data('role'));
                        break;
                    default:
                        document.execCommand($(this).data('role'), false, null);
                        break;
                }

                var textval = $("#editor").html();
                $("#editorCopy").val(textval);
            });

            $("#editor").keyup(function() {
                var value = $(this).html();
                $("#editorCopy").val(value);
            }).keyup();

            $('#checkIt').click(function(e) {
                e.preventDefault();
                alert($("#editorCopy").val());
            });
        });
    </script>
</body>

</html>