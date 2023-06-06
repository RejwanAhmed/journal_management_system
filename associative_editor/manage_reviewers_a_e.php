<?php include('associative_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Assign Reviewers To Papers</h3>
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
                                    <th>Assign</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '3'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $serial_no;?></td>
                                            <td><?php echo $row['paper_title']?></td>
                                            <td><?php echo date('d-M-Y', strtotime($row['created_at']))?></td>
                                            <td><a href="view_paper_details_a_e.php?paper_id=<?php echo $row['paper_id'] ?>&associative_editor_id=1" class = "btn btn-primary fw-bold">View Details</a></td>
                                            <?php 
                                                if($row['paper_status']==3)
                                                {
                                                    ?>
                                                    <td class = "text-primary fw-bold"><?php echo "Handling"?></td>   
                                                    <?php
                                                }
                                            ?>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#assignReviewer<?php echo $row['id'] ?>">
                                                    Assign
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="assignReviewer<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="assignReviewer" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                        
                                                            <!-- modal header -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="assignReviewer">Assign Reviewer</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                                   
                                                           <form action="" method = "POST">
                                                                <input type="hidden" name = "paper_id" value = "<?php echo $row['id'] ?>">
                                                                <!-- modal body -->
                                                                <div class="modal-body">
                                                                    <!-- select all reviewers to assign paper -->
                                                                    
                                                                    <?php 
                                                                        $select_reviewer = "SELECT `id`, `reviewer_name`, `reviewer_email` FROM `reviewer_information`";
                                                                        $run_select_reviewer = mysqli_query($conn, $select_reviewer);
                                                                        $total_reviewer = mysqli_num_rows($run_select_reviewer);
                                                                        
                                                                        ?>
                                                                        <div class="row justify-content-center">
                                                                            <?php 
                                                                            $i=1;
                                                                            while($row_reviewer = mysqli_fetch_assoc($run_select_reviewer))
                                                                            {                         
                                                                                ?>
                                                                                    <!-- reviewer er mail hidden obosthay jabe -->
                                                                                    <input type="hidden" name = "reviewer_email<?php echo $i?>" value = "<?php echo $row_reviewer['reviewer_email'] ?>">
                                                                                    
                                                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                                                        <label for=""><?php echo $i.". ".$row_reviewer['reviewer_name']?></label>
                                                                                        <input type="checkbox" name = "reviewer<?php echo $i ?>" value = "<?php echo $row_reviewer['id'] ?>">
                                                                                        <hr>
                                                                                    </div>
                                                                                    
                                                                                <?php
                                                                                $i++;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    
                                                                    <!--End of select all reviewers to assign paper -->
                                                                </div>
                                                                
                                                                <!-- modal footer -->
                                                                <div class="modal-footer">
                                                                    <input type="submit" class = "btn btn-danger" name = "submit" value = "Submit">
                                                                </div>
                                                           </form>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
<?php include('associative_editor_footer.php')?>

<?php 
    if(isset($_POST['submit']))
    {
        $paper_id = $_POST['paper_id'];
        $all_reviewer_id = array();
        $all_reviewer_email = array();
        for($i=1;$i<=$total_reviewer;$i++)
        {
            if(isset($_POST['reviewer'.$i]))
            {
               array_push($all_reviewer_id, $_POST['reviewer'.$i]);
               array_push($all_reviewer_email, $_POST['reviewer_email'.$i]);
               
            }
        }
        // sobgula reviwer id string kore rakha hoyse.
        $all_reviewer_id = implode(",", $all_reviewer_id);
        
        // jdi reviewer assign hoye jay tkhn paper_status = 4 hobe
        $paper_status = 4;
        // jdi ektao select na kore submit click kore tkhn update na kore warning dibo
        if($all_reviewer_id == "")
        {
            ?>
                <script>
                    window.alert("Please Select at least 1 Reviewer");
                </script>
            <?php 
        }
        else
        {
            $update_paper_info = "UPDATE `new_paper` SET `reviewer_id` = '$all_reviewer_id', `paper_status` = '$paper_status' WHERE `id` = '$paper_id'";
            $run_update_paper_info = mysqli_query($conn, $update_paper_info);
            
            if($run_update_paper_info)
            {
                for($i=0;$i<sizeof($all_reviewer_email);$i++)
                {
                    $receiver = $all_reviewer_email[$i];
                    $subject = "Selected For Paper Review";
                    $body = '<h5>Dear Sir/Madam, <br />'.$_SESSION['associative_editor_name'].'has selected you to reviewe a paper. Please login into the site and review the paper when you have time.<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
                    $send_mail = send_mail($receiver, $subject, $body);
                }
                ?>
                    <script>
                        window.alert("A mail has been sent to all the reviewer");
                        window.location = "manage_reviewers_a_e.php";
                    </script>
                <?php 
            }
        }
    }
?>
