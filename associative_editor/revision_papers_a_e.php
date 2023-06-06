<?php include('associative_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Revision Papers</h3>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count`>'1' AND `associative_editor_id` = '$_SESSION[associative_editor_id]'";
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
                                            
                                            <td class = "text-secondary fw-bold"><?php echo "Re-Submission"?></td>
                                            <td>
                                                <form action="" method = "POST">
                                                    <!-- reviewer_id niyechi jate tader email get kore mail er maddhome janate pari je paper resubmit hoyse -->
                                                    <input type="hidden" name = "id_re_sbmt_paper" value = "<?php echo $row['id'] ?>">
                                                    <input type="hidden" name = "reviewer_id" value = "<?php echo $row['reviewer_id'] ?>">
                                                    <input type="submit" class = "form-contorl btn btn-info fw-bold" name = "inform_reviewer" value = "Inform Reviewers">
                                                </form>
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
<?php 
    if(isset($_POST['inform_reviewer']))
    {
        $id_re_sbmt_paper = $_POST['id_re_sbmt_paper'];
        // reviewer inform kora mane hocche reviewer age theke assign ache sudhu take janano. tai status 4 hobe.
        $paper_status = 4;
        $all_reviewer_id = explode(",", $_POST['reviewer_id']);
        
        $update_paper_info = "UPDATE `new_paper` SET `paper_status` = '$paper_status' WHERE `id` = '$id_re_sbmt_paper'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
        
        if($run_update_paper_info)
        {
            for($i=0;$i<sizeof($all_reviewer_id);$i++)
            {
                // fetch all selected reviewers email one by one to send mail
                $select_reviewer_info = "SELECT `reviewer_email` FROM `reviewer_information` WHERE `id` = '$all_reviewer_id[$i]'";
                $run_select_reviewer_info = mysqli_query($conn, $select_reviewer_info);
                $res_select_reviewer_info = mysqli_fetch_assoc($run_select_reviewer_info);
                $reviewer_email = $res_select_reviewer_info['reviewer_email'];
                
                $receiver = $reviewer_email;
                $subject = "Paper Resubmitted To Re-Review";
                $body = '<h5>Dear Sir/Madam, <br /> You are request to re-review paper that you have previously reviewed. Please login into the site and review the paper when you have time.<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
                $send_mail = send_mail($receiver, $subject, $body);
            }
            ?>
                <script>
                    window.alert("A mail has been sent to all the reviewer");
                    window.location = "new_papers_a_e.php";
                </script>
            <?php
        }
    }
?>
<?php include('associative_editor_footer.php')?>