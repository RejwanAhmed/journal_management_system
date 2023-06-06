<?php include('associative_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">New Submitted Papers</h3>
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
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count` = '1' AND `associative_editor_id` = ''";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $serial_no;?></td>
                                            <td><?php echo $row['paper_title']?></td>
                                            <td><?php echo date('d-M-Y', strtotime($row['created_at']))?></td>
                                            <td><a href="view_paper_details_a_e.php?paper_id=<?php echo $row['paper_id'] ?>&associative_editor_id=0" class = "btn btn-primary fw-bold">View Details</a></td>
                                            <td class = "text-secondary fw-bold"><?php echo "New Submission"?></td>
                                            <form action="" method = "POST">
                                                <!-- nicher hidden type input use korechi jate kore amra kon paper handle korchi ta jante pari -->
                                               <input type="hidden" name = "paper_id" value = "<?php echo $row['id'] ?>">
                                               <td>
                                                    <input type="submit" name = "handle" class = "form-control btn btn-secondary fw-bold" value = "Handle">
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
    if(isset($_POST['handle']))
    {
        // paper_id pawar pore amra oi paper er status change kore dibo 
        $paper_id = $_POST['paper_id'];
        // paper_status = 3 korbo tar mane hocche paper handle kortese associative editor
        $paper_status = 3;
        $associative_editor_id = $_SESSION['associative_editor_id'];
        
        $update_paper_info = "UPDATE `new_paper` SET `associative_editor_id` = '$associative_editor_id', `paper_status` = '$paper_status' WHERE `id` = '$paper_id'";
        $run_udate_paper_info = mysqli_query($conn, $update_paper_info);
        
        if($run_udate_paper_info)
        {
            ?>
                <script>
                    window.alert("You are handling the paper");
                    window.location = "manage_reviewers_a_e.php";
                </script>
            <?php 
        }
    }
   
?>
<?php include('associative_editor_footer.php')?>