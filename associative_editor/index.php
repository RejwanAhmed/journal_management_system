<?php include("associative_editor_header.php"); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-primary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-folder-open m-1"></i> New Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count` = '1' AND `associative_editor_id` = ''";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "new_papers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-secondary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-regular fa-envelope m-1"></i> Invited Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '2'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "invited_papers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-primary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-check-double m-1"></i> Revision Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count`>'1' AND `associative_editor_id` = '$_SESSION[associative_editor_id]'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "revision_papers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-secondary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-people-roof m-1"></i> Manage Reviewers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '3'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "manage_reviewers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-primary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-bell m-1"></i> Inform Main Editor</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '5' OR `paper_status` = '6'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "inform_main_editor_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-success text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-square-check m-1"></i> Accepted Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '100'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "accepted_papers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-danger text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-rectangle-xmark m-1"></i> Rejected Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '99'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "rejected_papers_a_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include("associative_editor_footer.php"); ?>