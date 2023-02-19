<section class="home-section mx-3 bg-light rounded shadow p-4">
    <div class="card">
        <div class="card-body p-4">
            <h4 class="float-start">Manage Job Posts</h4>
            <a class="btn btn-sm btn-primary float-end mb-2" href="index.php?page=create_post">
                <i class="fa fa-plus"></i> New Post
            </a>
            <div class="clearfix"></div>
            <div style="overflow: auto;">
                <table id="tbl" class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Branch</th>
                            <th>Job Positions</th>
                            <th>Expected Salary</th>
                            <th>Salary Type</th>
                            <th>Posted Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php indexPost(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>