<?php include("reviewer_header.php"); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-primary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-address-book m-1"></i> Assigned Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE  `paper_status` = '4' OR `paper_status` = '5'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = 0;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id))
                                        {
                                            $num_new_paper++;
                                        }
                                    }
                                ?>
                                <a href= "assigned_paper_r.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-secondary text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-regular fa-calendar-check m-1"></i> My Reviewed Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT *, MAX(count) as maximum_count, MAX(paper_status) as maximum_paper_status  FROM `new_paper` GROUP BY `paper_id`";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = 0;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id) AND ($row['paper_status']== -1 || $row['paper_status']== 6))
                                        {
                                            $num_new_paper++;
                                        }
                                    }
                                ?>
                                <a href= "my_reviewed_papers_r.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-success text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-square-check m-1"></i> Accepted Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE  `paper_status` = '100'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = 0;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id))
                                        {
                                            $num_new_paper++;
                                        }
                                    }
                                ?>
                                <a href= "accepted_papers_r.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 mt-2" >
                            <div class="card-body bg-danger text-white" style = "border-radius: 8px;">
                                <h5><i class="fa-solid fa-rectangle-xmark m-1"></i> Rejected Papers</h5>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE  `paper_status` = '99'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $num_new_paper = 0;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id))
                                        {
                                            $num_new_paper++;
                                        }
                                    }
                                ?>
                                <a href= "rejected_papers_r.php" class ="home_anker">Total Papers: <?php echo $num_new_paper ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php include("reviewer_footer.php"); ?>