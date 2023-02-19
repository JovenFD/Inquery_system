<?php
    if($profile['usertype']==2) {
        header('Location: index.php?page=update_account');
        die();
    }
?>
<section class="home-section mx-3 bg-light rounded shadow p-4">
    <div class="card">
        <div class="card-body p-4">
            <h4 class="float-start">Manage Users</h4>
            <a class="btn btn-sm btn-primary float-end mb-2" href="index.php?page=create_account">
                <i class="fa fa-user-plus"></i> New User
            </a>
            <div class="clearfix"></div>
            <div style="overflow: auto;">
                <table id="tbl" class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php indexUsers(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>