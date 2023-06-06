<?php include('associative_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Inform Main Editor About Paper Review Completion</h3>
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
                                    <th>Inform ME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `associative_editor_id` = '$_SESSION[associative_editor_id]' AND `paper_status` = '5' OR `paper_status` = '6'";
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
                                                if($row['paper_status']==5)
                                                {
                                                    ?>
                                                    <!-- paper_status = 5 mane hocche on review te ache. sathe eitao mean kore je review ses hoye gese hoytoba. ekhn review ses hoyse kina ta check korar jonno review_comment theke data niye aste hobe -->
                                                    <?php 
                                                        $total_reviewer = sizeof(explode(",", $row['reviewer_id']));
                                                        $select_reviewer_comment = "SELECT COUNT(id) as `total_comment` FROM `reviewer_comment` WHERE `paper_id` = '$row[paper_id]' AND `count` = '$row[count]' AND `options`!=''";
                                                        
                                                        $run_select_reviewer_comment = mysqli_query($conn, $select_reviewer_comment);
                                                        
                                                        $res_reviewer_comment= mysqli_fetch_assoc($run_select_reviewer_comment);
                                                        $total_reviewer_comment= $res_reviewer_comment['total_comment'];
                                                        
                                                        if($total_reviewer == $total_reviewer_comment)
                                                        {
                                                            if($row['count']>1)
                                                            {
                                                                ?>
                                                                    <td class = "all_review_done fw-bold"><?php echo "All Review Done <br> (Re-submitted)"?></td>
                                                                <?php 
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <td class = "all_review_done fw-bold"><?php echo "All Review Done"?></td>
                                                                <?php 
                                                            }
                                                            ?>            
                                                            <td>
                                                                <form action="" method = "POST">
                                                                    <input type="hidden" name = "id_new_paper" value = "<?php echo $row['id']?>">
                                                                    <input type="hidden" name = "paper_title" value = "<?php echo $row['paper_title'] ?>">
                                                                    <input type="hidden" name = "count_new_paper" value = "<?php echo $row['count'] ?>">
                                                                    
                                                                    <input type="submit" class = "form-control btn btn-info fw-bold" name = "inform_main_editor" value = "Inform ME">
                                                                </form>
                                                            </td>
                                                            <?php 
                                                        }
                                                        else
                                                        {
                                                            if($row['count']>1)
                                                            {
                                                                ?>
                                                                    <td class = "on_review fw-bold"><?php echo "Done Review ($total_reviewer_comment/$total_reviewer) <br> (Re-submitted)"?></td>
                                                                    <td>--</td>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <td class = "on_review fw-bold"><?php echo "Done Review ($total_reviewer_comment/$total_reviewer)"?></td>
                                                                    <td>--</td>
                                                                <?php
                                                            }
                                                            
                                                        }
                                                        
                                                    ?>
                                                    <?php 
                                                }
                                                else if($row['paper_status']==6)
                                                {   
                                                    if($row['count']==1)
                                                    {
                                                        ?>
                                                            <td class = "informed_me fw-bold">Informed ME</td>
                                                            <td>--</td>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <td class = "informed_me fw-bold">Informed ME <br> (Re-submitted)</td>
                                                            <td>--</td>
                                                        <?php 
                                                    }
                                                    
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
<?php include('associative_editor_footer.php')?>

<?php 
    if(isset($_POST['inform_main_editor']))
    {
        $id_new_paper = $_POST['id_new_paper'];
        $paper_title = $_POST['paper_title'];
        // review kora ses ekhn main_editor ke inform korte hobe tai paper_status = 6 hobe
        $paper_status = 6;
        
        $update_paper_info = "UPDATE `new_paper` SET `paper_status` = '$paper_status' WHERE `id` = '$id_new_paper'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
        
        if($run_update_paper_info)
        {
            // GET Main Editor Email Address
            $select_main_editor = "SELECT `main_editor_email` FROM `main_editor_information`";
            $run_select_main_editor = mysqli_query($conn, $select_main_editor);
            $res_select_main_editor = mysqli_fetch_assoc($run_select_main_editor);
            $main_editor_email = $res_select_main_editor['main_editor_email'];

            $receiver = $main_editor_email;
            $subject = "All Review Completed";
            $body = '<h5>Dear Sir/Madam, <br /> All reviewers has completed their review for the paper: '.$paper_title.'. Please login into the site and review the paper when you have time.<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);

            ?>
                <script>
                    window.alert("A mail has been sent to Main Editor");
                    window.location = "inform_main_editor_a_e.php";
                </script>
            <?php 
        }
        
    }
?>
