<?php include("main_editor_header.php"); ?>
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
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count`='1'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "new_papers_m_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-secondary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-check-double m-1"></i> Revision Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count` > '1'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "revision_papers_m_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-primary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-regular fa-calendar-check m-1"></i> Review Done Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '6'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "review_done_papers_m_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-success text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-square-check m-1"></i> Accepted Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '100'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "accepted_papers_m_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-danger text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-rectangle-xmark m-1"></i> Rejected Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '99'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                                ?>
                                <a href= "rejected_papers_m_e.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include("main_editor_footer.php"); ?>