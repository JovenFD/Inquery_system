<section class="home-section mx-3 bg-light rounded shadow p-4">

    <div class="card">
        <div class="card-body p-4">
        <h4>Personal Information</h4>
            <form action="../route.php" method="post" enctype="multipart/form-data">
                <div class="profile-container text-center">
                    <img id="avatar" src="../uploads/<?php userData('u_avatar'); ?>" width="90" height="90" alt="avatar">
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
                    <input value="<?php userData('fname'); ?>" type="text" name="fname" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Firstname:" required />
                    <label for="">Last Name:</label>
                    <input value="<?php userData('lname'); ?>" type="text" name="lname" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Last Name" required />
                    <label for="">Gender:</label>
                    <select name="gender" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" require>
                        <option disabled>Select Your Gender</option>
                        <option <?php echo userData('gender') == 'Male' ? 'selected' : ''; ?> value="Male">Male</option>
                        <option <?php echo userData('gender') == 'Female' ? 'selected' : ''; ?> value="Female">Female</option>
                    </select>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Birth Date:</label>
                            <input value="<?php userData('dob'); ?>" type="date" name="dob" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" value="<?php echo date('Y-m-d'); ?>" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Email:</label>
                            <input value="<?php userData('email'); ?>" type="email" name="email" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Email:" required />
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 mt-5"></div>
                <div class="col-sm-5 mt-5">
                    <label for="">Username:</label>
                    <input value="<?php userData('username'); ?>" type="text" name="username" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Username:" required />
                    <label for="">Old Password:</label>
                    <input type="password" name="opass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Old Password:" required />
                    <label for="">New Password:</label>
                    <input type="password" name="npass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="New Password:" required />
                    <label for="">Confirm Password:</label>
                    <input type="password" name="cpass" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" placeholder="Confirm Password:" required />
                </div>
            </div>

            <input type="hidden" name="route" value="updateuser">

            <center class="mt-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Update</button>
            </center>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body p-4">
            <h4>Job Application</h4>
            <div style="overflow: auto;">
                <table id="tbl" class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Job Postion</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Resume/CV</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>