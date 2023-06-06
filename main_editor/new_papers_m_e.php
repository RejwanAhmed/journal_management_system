<?php include('main_editor_header.php')?>
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
                                    <th>Select</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '1' AND `count`='1'";
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
                                            <td class = "text-secondary fw-bold"><?php echo "New Submission"?></td>
                                                            
                                            <form action="" method = "POST">
                                            <!-- nicher hidden type input use korechi jate kore amra serial number get korte pari. koy number invite button click hocche tar jonno serial number dorkar -->
                                            <input type="hidden" name = "serial_no" value = "<?php echo $serial_no; ?>">
                                            <input type="hidden" name = "paper_id" value = "<?php echo $row['id'] ?>">
                                            <td>
                                            <!-- Fetch all associative editor for invitation -->
                                            <?php 
                                                $select_associative_editor = "SELECT `id`, `associative_editor_name` as `name`, `associative_editor_email` as `email` FROM `associative_editor_information`";
                                                $run_select_associative_editor = mysqli_query($conn, $select_associative_editor);
                                                
                                            ?>
                                                <select class = "form-control" name="ass_editor_id_mail<?php echo $serial_no ?>" required>
                                                    <option value="" selected>Please Select Associative Editor</option>
                                                    <?php
                                                        while($row_ass_editor = mysqli_fetch_assoc($run_select_associative_editor))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $row_ass_editor['id'].' '.$row_ass_editor['email'] ?>"><?php echo $row_ass_editor['name']?></option>   
                                                            <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name = "invite" class = "form-control btn btn-secondary fw-bold" value = "Invite">           
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
    if(isset($_POST['invite']))
    {
        $serial_no = $_POST['serial_no'];
        // serial_no get korar pore je invite button e click kora hocche setar pase jei associative editor ke select kora hoyse tar id and email get korte parchi.
        
        // id and email (space) dara divide kora ache.
        // explode korar karon id ta 0 index e and email ta 1 index e array hisabe chole asche.
        $associative_editor_id_email = explode(" ", $_POST['ass_editor_id_mail'.$serial_no]);
        $associative_editor_id = $associative_editor_id_email[0];
        $associative_editor_email = $associative_editor_id_email[1];
        
        // paper_id nicchi karon je paper e associative editor assign korbo sei editor er id ta oi paper e write kore dibo.
        $paper_id = $_POST['paper_id'];
        // jehetu invite kortesi associative_editor ke tai paper er status 2 hobe.
        $paper_status = 2;
        
        $update_paper_info = "UPDATE `new_paper` SET `associative_editor_id` = '$associative_editor_id', `paper_status` = '$paper_status' WHERE `id` = '$paper_id'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
        
        if($run_update_paper_info)
        {
            // sent mail
            $receiver = $associative_editor_email;
            $subject = "New Paper Invitation";
            $body = '<h5>Dear Sir/Madam, <br />You are invited for a new paper to work as an editor. If you are interested please accept, otherwise reject the invitation. <br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);
            ?>
            <script>
                window.alert("A mail has been sent to the associative editor");
                window.location = "new_papers_m_e.php";
            </script>
            <?php
        }
    }
?>

<?php include('main_editor_footer.php')?>