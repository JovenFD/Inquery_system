<section class="home-section mx-3 bg-light rounded shadow p-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Job Details</h4>
                </div>
                <div class="card-body p-4">
                    <h4>Admin Staff</h4>
                    <?php previewPost(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start">Application Form</h4>
                </div>
                <div class="card-body p-4">
                    <p>Full Name <?php userData('fname'); ?>, <?php userData('lname'); ?></p>
                    <p>Email user <a href="mailto:<?php userData('email'); ?>"><?php userData('email'); ?></a></p>

                    <form action="../route.php" method="post" enctype="multipart/form-data">
                        <label for="">Make your Pitch*</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Tell us are the best candidate for the position..."></textarea>

                        <label>Resume/CV File:</label>
                        <input type="file" name="file" class="form-control">
                        <p>Word/Pdf</p>

                        <input type="hidden" name="post_id" value="updateuser">

                        <input type="hidden" name="route" value="create_appform">

                        <center>
                            <button type="submit" class="btn btn-sm btn-primary">Send Application</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>