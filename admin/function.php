<?php
session_start();
include('../classes/Model.php');
include('../classes/ControllerLogin.php');
include('../classes/ControllerAdmin.php');
$accObj    = new ControllerLogin();
$objAdmin  = new ControllerAdmin();

$up_id = isset($_GET['up_id']) ? $_GET['up_id'] : '';

$index = $objAdmin->getIndex(
    $up_id,
    'post_id',
    'tbl_post'
);

$indexUser = $objAdmin->getIndex(
    $up_id,
    'user_id',
    'tbl_user'
);

$profile = $accObj->getProfile(
    isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''
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
    global $profile;

    echo $profile[$params];
}

function indexBranches()
{
    global $objAdmin;

    foreach ($objAdmin->indexBranches() as $row) {
        echo "<tr>
                <td>$row[branches_id]</td>
                <td>$row[branches_name]</td>
                <td class='text-center'>
                    <a href='#' onclick='removeMsg($row[branches_id])'>
                        <i class='fa-solid fa-trash text-danger'></i>
                    </a>   
                </td>
            </tr>";
    }
}

function indexPosition()
{
    global $objAdmin;

    foreach ($objAdmin->indexPosition() as $row) {
        echo "<tr>
                <td>$row[positions_id]</td>
                <td>$row[position_name]</td>
                <td class='text-center'>
                    <a href='#' onclick='removeMsg($row[positions_id])'>
                        <i class='fa-solid fa-trash text-danger'></i>
                    </a>   
                </td>
            </tr>";
    }
}

function dpList()
{
    global $objAdmin;

    echo "<div class='row'><div class='col-sm-6'><label>Branch:</label>
        <select name='branches' class='form-select px-3 fs-6 fw-normal mb-2'>
        <option disabled>Select Branches</option>";

    foreach ($objAdmin->indexBranches() as $row) {
        echo "
            <option value='$row[branches_id]'>$row[branches_name]</option>
        ";
    }

    echo "</select></div> 
    <div class='col-sm-6'>
        <label>Job Position:</label>
            <select name='jobposition' class='form-select px-3 fs-6 fw-normal mb-2'>;
            <option disabled>Select Job Position</option>
        ";

    foreach ($objAdmin->indexPosition() as $row) {
        echo "
            <option value='$row[positions_id]'>$row[position_name]</option>
        ";
    }
    echo "</select></div></div>";
}


function indexPost()
{
    global $objAdmin;

    foreach ($objAdmin->indexPost() as $row) {
        echo "<tr>
                <td>$row[post_id]</td>
                <td>$row[branches_name]</td>
                <td>$row[position_name]</td>
                <td>$row[expect_salary]</td>
                <td>$row[salary_type]</td>
                <td>$row[p_created_date]</td>
                <td class='text-center'>
                    <a href='index.php?page=preview_post&up_id=$row[post_id]'>
                        <i class='fa-solid fa-eye text-success'></i>
                    </a>
                    <a href='index.php?page=create_post&up_id=$row[post_id]'>   
                        <i class='fa-solid fa-pencil text-primary'></i>
                    </a>
                    <a href='#' onclick='removeMsg($row[post_id])'>
                        <i class='fa-solid fa-trash text-danger'></i>
                    </a>   
                </td>
            </tr>";
    }
}

function previewPost()
{
    global $up_id;
    global $objAdmin;

    $index = $objAdmin->getIndexPostTable(
        $up_id
    );

    $postTime = date('Y-m-d h:i', strtotime($index['p_created_date']));


    echo "
        <h4 class='text-uppercase fw-bold'>$index[position_name]</h4>
        <small>Time posted: $postTime</small>
        <p style='text-indent: 50px; text-align: justify;' class='mt-5'><strong>$index[job_descriptions]</strong></p>
        <div class='row mt-5'>
            <div class='col-md-6'>
                <label class='fw-bold'>Expected Salary:</label>
                $index[expect_salary]
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
            <div class='col-md-6'>
                <label class='fw-bold'>Address:</label>
                $index[p_address]
            </div>
        </div>

        <div class='row mt-3'>
            <div class='col-md-6'>
                <label class='fw-bold'>Knowledge or Skills needed:</label>
                $index[ks_needed]
            </div>
            <div class='col-md-6'>
                <label class='fw-bold'>Email:</label>
                <a href='mailto:$index[p_email]'>$index[p_email]</a>
            </div>
        </div>
    ";
}

function indexUsers()
{
    global $objAdmin;

    foreach ($objAdmin->indexUsers() as $row) {
        echo "<tr>
                <td>$row[user_id]</td>
                <td>
                    <center>
                        <img width='50' height='50' src='../uploads/$row[u_avatar]'>
                    </center>
                </td>
                <td class='pt-3'>$row[fname]</td>
                <td class='pt-3'>$row[lname]</td>
                <td class='pt-3'>$row[email]</td>
                <td class='pt-3'>$row[username]</td>
                <td class='text-center pt-3'> 
                    <a href='index.php?page=create_account&up_id=$row[user_id]'>   
                        <i class='fa-solid fa-pencil text-primary'></i>
                    </a> 
                </td>
                <td class='text-center pt-3'>
                    <a href='#' onclick='removeMsg($row[user_id])'>
                        <i class='fa-solid fa-trash text-danger'></i>
                    </a>  
                </td>
            </tr>";
    }
}