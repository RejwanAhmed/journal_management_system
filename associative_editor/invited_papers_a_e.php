<?php include('associative_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Invited Papers</h3>
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
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '2'";
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
                                                
                                                if($row['paper_status']==2)
                                                {
                                                    ?>
                                                        <td class = "text-info fw-bold"><?php echo "Invited"?></td>
                                                    <?php
                                                }
                                            ?>
                                            <form action="" method = "POST">
                                                <!-- nicher hidden type input use korechi jate kore amra kon paper accept or reject korchi ta jante pari -->
                                                
                                                <input type="hidden" name = "paper_id" value = "<?php echo $row['id'] ?>">
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-5 mt-1">
                                                            <input type="submit" class = "form-control btn btn-success" name = "accept" value = "Accept">
                                                        </div>
                                                        <div class="col-lg-5 mt-1">
                                                            <input type="submit" class = "form-control btn btn-danger" name = "reject" value = "Reject">
                                                        </div>
                                                    </div>         
                                                </td>
                                            </form>
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
    if(isset($_POST['accept']))
    {
        // paper_id pawar pore amra oi paper er status change kore dibo 
        $paper_id = $_POST['paper_id'];
        // accept hole paper_status = 3 hobe
        $paper_status = 3;
        $update_paper_info = "UPDATE `new_paper` SET `paper_status` = '$paper_status' WHERE `id` = '$paper_id'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
        if($run_update_paper_info)
        {   
            // fetch main editor email
            $select_main_editor_mail = "SELECT `main_editor_email` FROM `main_editor_information`";
            $run_select_main_editor_mail = mysqli_query($conn, $select_main_editor_mail);
            $res_select_main_editor_mail = mysqli_fetch_assoc($run_select_main_editor_mail);
            // end of fetch main editor email
            
            $receiver = $res_select_main_editor_mail['main_editor_email'];
            $subject = "Invited Paper Accepted";
            $body = '<h5>Dear Sir/Madam, <br />'.$_SESSION['associative_editor_name'].'has received your invitation for a paper to work as an editor<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);
            ?>
                <script>
                    window.alert("A mail has been sent to the main editor");
                    window.location = "manage_reviewers_a_e.php";
                </script>
            <?php 
        }
    }
    else if(isset($_POST['reject']))
    {
        $paper_id = $_POST['paper_id'];
        // reject hole paper_status = 1 hobe
        $paper_status = 1;
        $update_paper_info = "UPDATE `new_paper` SET `paper_status` = '$paper_status', `associative_editor_id` = '' WHERE `id` = '$paper_id'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
        if($run_update_paper_info)
        {   
            // fetch main editor email
            $select_main_editor_mail = "SELECT `main_editor_email` FROM `main_editor_information`";
            $run_select_main_editor_mail = mysqli_query($conn, $select_main_editor_mail);
            $res_select_main_editor_mail = mysqli_fetch_assoc($run_select_main_editor_mail);
            // end of fetch main editor email
            
            $receiver = $res_select_main_editor_mail['main_editor_email'];
            $subject = "Invited Paper Rejected";
            $body = '<h5>Dear Sir/Madam, <br />'.$_SESSION['associative_editor_name'].'has rejected your invitation for a paper to work as an editor<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);
            ?>
                <script>
                    window.alert("A mail has been sent to the main editor");
                    window.location = "new_papers_a_e.php";
                </script>
            <?php 
        }
    }
?>
<?php include('associative_editor_footer.php')?>