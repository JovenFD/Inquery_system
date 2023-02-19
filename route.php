<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include('header.php');
    include('classes/Model.php');
    include('autoloader.php');
    ?>
</head>

<body>
    <?php
    $accObj    = new ControllerLogin();
    $objAdmin  = new ControllerAdmin();

    $routePost = isset($_POST['route']) ? $_POST['route'] : false;
    $routeGet = isset($_GET['route']) ? $_GET['route'] : false;

    $sessionData = $accObj->getProfile(
        isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''
    );

    if ($routePost === 'login') {
        $response = $accObj->getLogin(
            $_POST
        );

        if ($response['status'] == 'success') {

            $_SESSION['user_id']  = $response['message']['user_id'];
            $_SESSION['loggedin'] = 'loggedin';

            switch ($response['message']['usertype']) {
                case 0:
                case 2:
                    header('Location: admin/');
                    break;
                case 1:
                    header('Location: user/');
                    break;
            }
        } elseif ($response['status'] == 'warning') {
            url(
                'warning',
                $response['message'],
                'index.php'
            );
        } else {
            url(
                'error',
                $response['message'],
                'index.php'
            );
        }
        die();
    }

    if ($routePost === 'register') {
        $response = $accObj->createUser(
            $_POST
        );

        if ($response['status'] == 'success') {
            url(
                'success',
                $response['message'],
                'index.php'
            );
        } else {
            url(
                'error',
                $response['message'],
                'index.php?page=register'
            );
        }
        die();
    }

    if ($routePost === 'updateuser') {
        $oldpass = $accObj->getProfile(
            isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''
        );

        if ($oldpass['password'] !== md5($_POST['opass'])) {

            url(
                'warning',
                'Invalid old password!',
                'user/'
            );
            die();
        }

        if ($_POST['npass'] !== $_POST['cpass']) {

            url(
                'warning',
                'Password not match!',
                'user/'
            );
            die();
        }

        if ($_FILES['file']['error'] == 4) {
            $file = $_FILES['file']['error'];
        } else {
            $file = uploaderFile($_FILES['file']['name']);
        }

        $response = $accObj->updateUser(
            $_POST,
            $file,
            $sessionData
        );

        if ($response['status'] == 'success') {

            if ($sessionData['usertype'] == 0) {
                url(
                    'success',
                    $response['message'],
                    'admin/'
                );
            } else {
                url(
                    'success',
                    $response['message'],
                    'user/'
                );
            }
        } else {
            if ($sessionData['usertype'] == 0) {
                url(
                    'success',
                    $response['message'],
                    'admin/'
                );
            } else {
                url(
                    'success',
                    $response['message'],
                    'user/'
                );
            }
        }
        die();
    }


    if ($routeGet == 'branches') {

        $response = $objAdmin->destroy(
            $_GET['id'],      //id
            'branches_id',   //id name attribute
            'tbl_branches'  //tbl name
        );

        main_back_url($response, $routeGet);
    }


    if ($routePost === 'a_createBranches') {

        $response = $objAdmin->createBranches(
            $_POST
        );

        main_back_url($response, 'branches');
    }


    if ($routeGet == 'positions') {

        $response = $objAdmin->destroy(
            $_GET['id'],      //id
            'positions_id',   //id name attribute
            'tbl_postions'  //tbl name
        );

        main_back_url($response, $routeGet);
    }


    if ($routePost === 'a_createPositions') {

        $response = $objAdmin->createPositions(
            $_POST
        );

        main_back_url($response, 'positions');
    }

    if ($routePost === 'a_createPosts') {

        $response = $objAdmin->createPost(
            $_POST
        );

        main_back_url($response, 'post');
    }


    if ($routePost === 'a_createuser') {

        $oldpass = $accObj->getProfile(
            $_POST['user_id']
        );

        if (
            isset($_POST['npass']) && 
            isset($_POST['opass']) &&
            $oldpass['password'] !== md5($_POST['opass'])
        ) {

            url(
                'warning',
                'Invalid old password!',
                'admin/index.php?page=home'
            );
            die();
        }

        if ($_POST['npass'] !== $_POST['cpass']) {

            url(
                'warning',
                'Password not match!',
                'admin/index.php?page=home'
            );
            die();
        }

        if ($_FILES['file']['error'] == 4) {
            $file = $_FILES['file']['error'];
        } else {
            $file = uploaderFile($_FILES['file']['name']);
        }

        $response = $objAdmin->createUser(
            $_POST,
            $file
        );

        main_back_url($response, 'home');
    }

    if ($routeGet == 'home') {;

        $response = $objAdmin->destroy(
            $_GET['id'],  //id
            'user_id',   //id name attribute
            'tbl_user'  //tbl name
        );

        main_back_url($response, $routeGet);
    }

    function main_back_url($response, $routeGet)
    {
        if ($response['status'] == 'success') {
            url(
                'success',
                $response['message'],
                "admin/index.php?page=$routeGet"
            );
        } else {
            url(
                'error',
                $response['message'],
                "admin/index.php?page=$routeGet"
            );
        }
        die();
    }


















    if (isset($_POST['updateLogo'])) {
        if (empty($_FILES['file']['name'])) {
            url(
                'warning',
                'Empty Choose File Logo Please Try Again!.',
                'settings.php'
            );
            die();
        }
        $file = '';

        $file = uploaderFile($_FILES['file']['name']);

        $response = $settingObj->updateLogo(
            $file,
            $_POST['updateLogo']
        );

        if ($response['status'] == 'success') {
    ?>
            <script>
                let timerInterval
                Swal.fire({
                    html: 'Uploading...<b></b>',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "<?php echo $response['message']; ?>",
                            showConfirmButton: false,
                            timer: 2000
                        })
                        setTimeout(() => {
                            window.location = 'settings.php'
                        }, 2000)
                    }
                })
            </script>
    <?php
        } else {
            url(
                'error',
                $response['message'],
                'settings.php'
            );
        }
        die();
    }

    function uploaderDocument($file)
    {
        $fileUpload = '';
        if (!empty($file)) {
            include('uploaderDoc.php');

            $fileUpload = upload($_FILES['file'], './uploads/');

            if ($fileUpload['status'] == 'success') {
                return $fileUpload['avatar'];
            } else {
                print_r($fileUpload['message']);
            }
            die();
        }
        return '';
    }

    function uploaderFile($file)
    {
        $fileUpload = '';
        if (!empty($file)) {
            include('uploader.php');

            $fileUpload = upload($_FILES['file'], './uploads/');

            if ($fileUpload['status'] == 'success') {
                return $fileUpload['avatar'];
            } else {
                print_r($fileUpload['message']);
            }
            die();
        }
        return '';
    }


    if (isset($_POST['editDocument'])) {
        $file = '';

        $file = uploaderDocument($_FILES['file']['name']);
        $response = $catObj->editDocs(
            $_POST,
            $file
        );

        if ($response['status'] == 'success') {
            url(
                'success',
                $response['message'],
                'document.php'
            );
        } else {
            url(
                'error',
                $response['message'],
                'document.php'
            );
        }
        die();
    }



    // remove
    if (isset($_GET['removeCategory'])) {
        $response = $catObj->removeCategory(
            $_GET['removeCategory']
        );

        if ($response['status'] == 'success') {
            url(
                'success',
                $response['message'],
                'document.php'
            );
        } else {
            url(
                'error',
                $response['message'],
                'document.php'
            );
        }
        die();
    }

    // mag
    function url($icon, $msg, $path)
    {
        echo '
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "' . $icon . '",
                        title: "' . $msg . '",
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
            ';

        echo '
                <script>
                    setTimeout(() => {
                        window.location="' . $path . '";
                    }, 1000);
                </script>
            ';
    }
    ?>


</body>

</html>