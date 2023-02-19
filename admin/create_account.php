<section class="home-section mx-3 bg-light rounded shadow p-4">

    <div class="card">
        <div class="card-body p-4">
            <h4><?php echo isset($_GET['up_id']) ? 'Edit' : 'Create';?> Account</h4>
            <form action="../route.php" method="post" enctype="multipart/form-data">
                <div class="profile-container text-center">
                    <img id="avatar" src="../uploads/<?php echo isset($indexUser['u_avatar']) ? $indexUser['u_avatar'] : 'avatar.png'; ?>" width="90" height="90" alt="avatar">
                    <input id="fileChooser" type="file" name="file" class="inputField input-form form-control px-3 fs-6 fw-normal mt-2">
                    <script>
                        fileChooser.onchange = (e) => {
                            if (e.target.files && e.target.files[0]) {
                                document.querySelector('#avatar').src = URL.createObjectURL(event.target.files[0]);
                            }
                        }
                    </script>
                </div>

                <div class="row">
                    <div class="col-sm-5 mt-5">
                        <label for="">First Name:</label>
                        <input value="<?php echo isset($indexUser['fname']) ? $indexUser['fname'] : ''; ?>" type="text" name="fname" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Firstname:" required />
                        <label for="">Last Name:</label>
                        <input value="<?php echo isset($indexUser['lname']) ? $indexUser['lname'] : ''; ?>" type="text" name="lname" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Last Name" required />

                        <label for="">Email:</label>
                        <input value="<?php echo isset($indexUser['email']) ? $indexUser['email'] : ''; ?>" type="email" name="email" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Email:" required />

                    </div>
                    <div class="col-sm-2 mt-5"></div>
                    <div class="col-sm-5 mt-5">
                        <label for="">Username:</label>
                        <input value="<?php echo isset($indexUser['username']) ? $indexUser['username'] : ''; ?>" type="text" name="username" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Username:" required />
                        <?php if(isset($_GET['up_id'])):?>
                            <label for="">Old Password:</label>
                            <input type="password" name="opass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Old Password:" required />
                        <?php endif;?>
                        <label for="">New Password:</label>
                        <input type="password" name="npass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="New Password:" required />
                        <label for="">Confirm Password:</label>
                        <input type="password" name="cpass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Confirm Password:" required />
                    </div>
                </div>

                <input type="hidden" name="route" value="a_createuser">
                <input required type="hidden" name="user_id" value="<?php echo isset($indexUser['user_id']) ? $indexUser['user_id'] : ''; ?>">

                <center class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Submit</button>
                </center>
            </form>
        </div>
    </div>
</section>