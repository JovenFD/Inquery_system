<?php
session_start();
include('../classes/Model.php');
include('../classes/ControllerLogin.php');
include('../classes/ControllerAdmin.php');
include('../classes/ControllerUser.php');
$accObj    = new ControllerLogin();
$objAdmin  = new ControllerAdmin();
$objUser  = new ControllerUser();

$up_id = isset($_GET['up_id']) ? $_GET['up_id'] : '';

$index = $objAdmin->getIndex(
    $up_id,
    'post_id',
    'tbl_post'
);

function pages()
{

    if (empty($_SESSION['loggedin'])) {
        header('Location: ../index.php');
        die();
    }

    return isset($_GET['page']) ? $_GET['page'] : '';
}

function userData($params)
{
    global $accObj;

    $profile = $accObj->getProfile(
        isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''
    );

    echo $profile[$params];
}

function indexBranches()
{
    global $objAdmin;

    $inc = 1;

    foreach ($objAdmin->indexBranches() as $row) {
        echo "<li class='list-group-item list-group-item-action'>
                <a class='text-decoration-none text-black' href='index.php?page=positions&up_id=$row[branches_id]'>
                    $inc. $row[branches_name]
                </a>
            </li>";
        $inc++;
    }
}

function previewPost()
{
    global $up_id;
    global $objAdmin;

    $index = $objAdmin->getIndexPostTable(
        $up_id
    );

    echo "
    $index[p_address]
    
        <div class='row mt-5'>
            <div class='col-md-6'>
                <label class='fw-bold'>Expected Salary:</label>
                &#8369;$index[expect_salary]
            </div>
            <div class='col-md-6'>
                <label class='fw-bold'>Branch:</label>
                $index[branches_name]
            </div>
        </div>

        <div class='row mt-3'>
            <div class='col-md-6'>
                <label class='fw-bold'>Salary Type:</label>
                $index[salary_type]
            </div>
        </div>

        <div class='row mt-3'>
            <div class='col-md-6'>
                <label class='fw-bold'>Email:</label>
                <a href='mailto:$index[p_email]'>$index[p_email]</a>
            </div>
            <div class='col-md-6'>
                <label class='fw-bold'>Knowledge or Skills needed:</label>
                $index[ks_needed]
            </div>
        </div>
    ";
}


function headerPosition() {
    global $up_id;
    global $objUser;

    $index = $objUser->getSelectIndexPosition($up_id);
        
    foreach ($index as $key => $row ) {

        if($key == 0) {
            echo "
                <h4 class='text-uppercase fw-bold'>$row[branches_name]</h4>
                <label class='fw-bold'>Address:</label>
                $row[p_address]
            "; 
        }
    }
}


function getSelectIndexPosition() {
    global $up_id;
    global $objUser;

    $index = $objUser->getSelectIndexPosition($up_id);


    foreach ($index as $key => $row) {

        echo "
            <ul>
                <li>
                    <a class='text-decoration-none text-black' href='index.php?page=application_form&up_id=$row[post_id]'>
                        $row[position_name]
                    </a>
                </li>
            </ul>
            ";
    }
}