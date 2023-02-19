<section class="home-section mx-3 bg-light rounded shadow p-4">

    <div class="row">

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body p-4">
                    <h4>Manage Branches</h4>
                    <div style="overflow: auto;">
                        <table id="tbl" class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Branches</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php indexBranches(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-5">
                    <h4>Branches Form</h4>
                    <form action="../route.php" method="post">
                        <label for="">Branches Name:</label>
                        <textarea name="bname" id="" cols="30" rows="5" class="inputField input-form form-control px-3 fs-6 fw-normal mb-2" required placeholder="Type Branches here..."></textarea>

                        <input type="hidden" name="route" value="a_createBranches">

                        <center>
                            <button class="mt-3 btn btn-sm btn-primary">Submit</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section>