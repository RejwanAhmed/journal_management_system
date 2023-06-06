<?php include('main_editor_header.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">All Papers Status</h3>
                    <h5 class = "text-danger text-center "><i>AE = Associative Editor, ME = Main Editor</i></h5>
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
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`>=1";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $serial_no;?></td>
                                            <td><?php echo $row['paper_title']?></td>
                                            <td><?php echo date('d-M-Y', strtotime($row['created_at']))?></td>
                                            <td><a class = "form-control btn btn-primary fw-bold" href="view_paper_details_m_e.php?paper_id=<?php echo $row['paper_id']?>">View Details</a></td>
                                            <?php 
                                                if($row['paper_status']==1 )
                                                {
                                                    if($row['count']==1)
                                                    {
                                                        ?>
                                                            <td class = "text-secondary fw-bold"><?php echo "New Submission"?></td>
                                                        <?php
                                                    }
                                                     
                                                    else
                                                    {
                                                        ?>
                                                            <td class = "text-secondary fw-bold"><?php echo "Re-Submission"?></td>
                                                        <?php 
                                                    }
                                                }
                                                else if($row['paper_status']==2)
                                                {
                                                    ?>
                                                        <td class = "text-info fw-bold"><?php echo "Invited AE"?></td>
                                                    <?php
                                                }
                                                else if($row['paper_status']==3)
                                                {
                                                    ?>
                                                        <td class = "text-primary fw-bold"><?php echo "To AE"?></td>
                                                    <?php
                                                }
                                                else if($row['paper_status']==4)
                                                {
                                                    if($row['count']==1)
                                                    {
                                                        ?>
                                                            <td  class = "to_review fw-bold"><?php echo "To Reviewer"?></td>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <td  class = "to_review fw-bold"><?php echo "To Reviewer <br> (Re-submitted)";
                                                            ?></td>
                                                        <?php
                                                    }
                                                }
                                                else if($row['paper_status']==5)
                                                {
                                                    // paper_status 5 mane review suru hoyse.
                                                    // ekhn koyjon er moddhe koyjone review suru korse ta dekhabo. jemon 5 joner moddhe ekjon suru korse seta ke 1/5 dekhabo.
                                                    
                                                    ?>
                                                        <td  class = "on_review fw-bold">
                                                            <?php 
                                                                if($row['count']==1)
                                                                {
                                                                    echo "On Review";
                                                                }
                                                                else
                                                                {
                                                                    echo "On Review <br> (Re-submitted)";
                                                                }
                                                            ?>
                                                            <?php 
                                                                // ei paper er total reviewer age check korbo.
                                                                $all_reviewer = explode(",", $row['reviewer_id']);
                                                                $total_reviewer = sizeof($all_reviewer);
                                                                
                                                                // koyjon cmnt korche ta check korbo.
                                                                 $select_reviewer_comment = "SELECT COUNT(id) as `total_comments` FROM `reviewer_comment` WHERE `paper_id` = '$row[paper_id]' AND `count` = '$row[count]'";
                                                                 
                                                                 $run_select_reviewer_comment = mysqli_query($conn, $select_reviewer_comment);
                                                                 
                                                                 $row_select_reviewer_comment = mysqli_fetch_assoc($run_select_reviewer_comment);
                                                                 $total_comments = $row_select_reviewer_comment['total_comments'];
                                                                 
                                                                 echo "($total_comments/$total_reviewer)";
                                                                 
                                                            ?>
                                                        </td>
                                                    <?php
                                                }
                                                else if($row['paper_status']==6)
                                                {
                                                    if($row['count']==1)
                                                    {
                                                        ?>
                                                            <td class = "all_review_done fw-bold"><?php echo "All Review Done and Informed ME"?></td>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <td class = "all_review_done fw-bold"><?php echo "All Review Done and Informed ME <br> (Re-submitted)"?></td>
                                                        <?php
                                                    }
                                                }
                                                else if($row['paper_status']==100)
                                                {
                                                    ?>
                                                        <td class = "text-success fw-bold"><?php echo "Accepted"?></td>
                                                    <?php
                                                }
                                                else if($row['paper_status']==99)
                                                {
                                                    ?>
                                                        <td class = "text-danger fw-bold"><?php echo "Rejected"?></td>
                                                    <?php
                                                }
                                                else if($row['paper_status']==0)
                                                {
                                                    ?>
                                                        <td class = "resubmit fw-bold"><?php echo "Resubmit"?></td>
                                                    <?php
                                                }
                                            ?>
                                        </tr>
                                        <?php 
                                        $serial_no++;
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
<?php include('main_editor_footer.php')?>