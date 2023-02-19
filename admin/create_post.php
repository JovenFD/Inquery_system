<section class="home-section mx-3 bg-light rounded shadow p-4">
    <div class="card">
        <div class="card-body">
            <h4><?php echo isset($index['post_id']) ? 'Update' : ''; ?> Job Posted Form</h4>
            <form action="../route.php" method="post">
                <?php dpList(); ?>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Expected Salary:</label>
                        <input value="<?php echo isset($index['expect_salary']) ? $index['expect_salary'] : ''; ?>" required type="number" name="expect_salary" class="input-form form-control px-3 fs-6 fw-normal mb-2">
                    </div>
                    <div class="col-md-6">
                        <label for="">Salary Type:</label>
                        <input value="<?php echo isset($index['salary_type']) ? $index['salary_type'] : ''; ?>" required type="text" name="salary_type" class="input-form form-control px-3 fs-6 fw-normal mb-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Email:</label>
                        <input value="<?php echo isset($index['p_email']) ? $index['p_email'] : ''; ?>" required type="email" name="email" class="input-form form-control px-3 fs-6 fw-normal mb-2">
                    </div>
                    <div class="col-md-6">
                        <label for="">Address:</label>
                        <input value="<?php echo isset($index['p_address']) ? $index['p_address'] : ''; ?>" required type="text" name="address" class="input-form form-control px-3 fs-6 fw-normal mb-2">
                    </div>
                </div>

                <label for="">Description:</label>
                <textarea name="description" requiredd cols="30" rows="6" class="input-form form-control px-3 fs-6 fw-normal mb-2" requiredd placeholder="Type Description here..."><?php echo isset($index['job_descriptions']) ? $index['job_descriptions'] : ''; ?></textarea>


                <label for="">Knowledge Skills needed:</label>
                <div id="editparent">
                    <div class="card">
                        <div class="card-body">
                            <div id="editControls">
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default" data-role="undo" href="#" title="Undo"><i class="fa fa-undo"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="redo" href="#" title="Redo"><i class="fa fa-repeat"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default" data-role="bold" href="#" title="Bold"><i class="fa fa-bold"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="italic" href="#" title="Italic"><i class="fa fa-italic"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="underline" href="#" title="Underline"><i class="fa fa-underline"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="strikeThrough" href="#" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default" data-role="indent" href="#" title="Blockquote"><i class="fa fa-indent"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="insertUnorderedList" href="#" title="Unordered List"><i class="fa fa-list-ul"></i></a>
                                    <a class="btn btn-xs btn-default" data-role="insertOrderedList" href="#" title="Ordered List"><i class="fa fa-list-ol"></i></a>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default" data-role="h1" href="#" title="Heading 1"><i class="fa fa-header"></i><sup>1</sup></a>
                                    <a class="btn btn-xs btn-default" data-role="h2" href="#" title="Heading 2"><i class="fa fa-header"></i><sup>2</sup></a>
                                    <a class="btn btn-xs btn-default" data-role="h3" href="#" title="Heading 3"><i class="fa fa-header"></i><sup>3</sup></a>
                                    <a class="btn btn-xs btn-default" data-role="p" href="#" title="Paragraph"><i class="fa fa-paragraph"></i></a>
                                </div>
                            </div>
                            <div id="editor" contenteditable><?php echo isset($index['ks_needed']) ? $index['ks_needed'] : ''; ?></div>
                            <textarea name="skills_need" id="editorCopy" requiredd="requiredd" style="display:none;" cols="30" rows="5" class="input-form form-control px-3 fs-6 fw-normal mb-2" requiredd placeholder="Type Knowledge Skills needed here..."><?php echo isset($index['ks_needed']) ? $index['ks_needed'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>


                <input required type="hidden" name="route" value="a_createPosts">
                <input required type="hidden" name="id_post" value="<?php echo isset($index['post_id']) ? $index['post_id'] : ''; ?>" required>

                <center>
                    <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                </center>
            </form>
        </div>
    </div>
</section>