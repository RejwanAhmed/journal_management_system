<?php include('reviewer_header.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">My Reviewed Papers</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class = "table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width = "30%">Paper Title</th>
                                    <th>Submission Date</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information 
                                    // ekta paper koyekbar jdi submit hoy tahole tar count onk gula hobe. jemon 3 bar submit hole last er tar count = 3 hobe. tar mane paper er details 3 bar ache. tai paper_id diye group kore sudhu ekbar ansi.
                                    $select_from_new_paper = "SELECT *, MAX(count) as maximum_count, MAX(paper_status) as maximum_paper_status  FROM `new_paper` GROUP BY `paper_id`";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        // new_paper table e onk reviewer_id thake. oita ke array te convert kore then in_array diye search korbo. tar fole je reviewer login korse se sudhu take assign kora paper dekhte parbe.
                                        //paper_status = -1 or paper_status = 6 er tai ante hobe. -1 mane resubmit hoyse. ar 6 mane review hoye gese. tai $row[paper_status] = -1 or 6 er sorto disi.
                                        
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id) AND ($row['paper_status']== -1 || $row['paper_status']== 6))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $serial_no;?></td>
                                                <td><?php echo $row['paper_title']?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row['created_at']))?></td>
                                                <td><a class = "form-control btn btn-primary fw-bold" href="view_paper_details_r.php?paper_id=<?php echo $row['paper_id']?>&r_id=<?php echo $row['reviewer_id'] ?>">View Details</a></td>
                                                <?php
                                                    // jdi count =1 hoy tar mane seta ekbari submit hoyse.
                                                    // jdi count 1 er besi hoy tar mane seta resubmit hoyse.
                                                    if($row['maximum_count']==1)
                                                    {
                                                        if($row['maximum_paper_status']==6)
                                                        {
                                                            ?>
                                                                <td class = "all_review_done fw-bold">Already Reviewed</td>
                                                            <?php 
                                                        }
                                                        else if($row['maximum_paper_status']==100)
                                                        {
                                                            ?>
                                                                <td class = "text-success fw-bold">Accepted</td>
                                                            <?php 
                                                        }
                                                        else if($row['maximum_paper_status']==99)
                                                        {
                                                            ?>
                                                                <td class = "text-danger fw-bold">Rejected</td>
                                                            <?php 
                                                        }
                                                    }
                                                    else
                                                    {
                                                        if($row['maximum_paper_status']==100)
                                                        {
                                                            ?>
                                                                <td class = "text-success fw-bold">Accepted</td>
                                                            <?php 
                                                        }
                                                        else if($row['maximum_paper_status']==99)
                                                        {
                                                            ?>
                                                                <td class = "text-danger fw-bold">Rejected</td>
                                                            <?php 
                                                        }
                                                        else if($row['maximum_paper_status']==6)
                                                        {
                                                            ?>
                                                                <td class = "all_review_done fw-bold">Re-sbumitted <br>(Already Reviewed)</td>
                                                            <?php 
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                <td class = "all_review_done fw-bold">Re-submitted</td>
                                                            <?php
                                                        }
                                                    }
                                                    
                                                    
                                                ?>
                                                
                                            </tr>
                                            <?php 
                                            $serial_no++;
                                        }       
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('reviewer_footer.php')?>
