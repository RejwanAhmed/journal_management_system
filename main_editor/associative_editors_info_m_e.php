<?php include('main_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Associative Editors Information</h3>
                </div>
                <div class="card-body">
                    <form action="" method = "POST">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-4 col-12 mb-3">
                                <div class="input-group input-group-sm mt-1">
                                    <div class="input-group-prepend">
                                        <span class = "input-group-text "><i class="fa-solid fa-magnifying-glass "></i></span>
                                    </div>
                                    <input type="text" class = "form-control" name = "search_name_wise" id = "search_name_wise" placeholder="Search By Name....." value = "<?php
                                    if(isset($_POST['show_all']))
                                    {
                                        echo "";
                                    }
                                    else if(isset($_POST['search_name_wise']))
                                    {
                                        echo "$_POST[search_name_wise]";
                                    }?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 text-center mb-3 ">
                                <input type="submit" name="search" value="Search" class = "form-control btn btn-secondary fw-bold">
                            </div>
                            <div class="col-lg-4 col-md-4  col-12 text-center mb-3 ">
                                <input type="submit" class ="form-control btn btn-secondary fw-bold" name = "show_all" value = "Show All">
                            </div>
                        </div>
                    </form>
                    
                    <div class="table-responsive">
                        <table class = "table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Contact No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST['search']))
                                    {
                                        $name = $_POST['search_name_wise'];
                                        if($name!=NULL)
                                        {
                                            $select_ass_editor_info = "SELECT * FROM `associative_editor_information` WHERE `associative_editor_name` like '%$name%'";
                                        }
                                        else
                                        {
                                            ?>
                                            <script>
                                                window.alert("Please Select At least 1 field");
                                                window.location = "associative_editors_info_m_e.php";
                                            </script>
                                            <?php
                                        }
                                        
                                    }
                                    else
                                    {
                                        $select_ass_editor_info = "SELECT * FROM `associative_editor_information` ORDER BY `id` DESC";
                                    }
                                    
                                    $run_select_ass_editor_info = mysqli_query($conn, $select_ass_editor_info);
                                    while($row = mysqli_fetch_assoc($run_select_ass_editor_info))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['associative_editor_name']?></td>
                                                <td><?php echo $row['associative_editor_university_name']?></td>
                                                <td><?php echo $row['associative_editor_designation']?></td>
                                                <td><?php echo $row['associative_editor_email']?></td>
                                                <td><?php echo $row['associative_editor_country']?></td>
                                                <td><?php echo $row['associative_editor_contact_no']?></td>
                                                
                                                <form action="" method = "POST">
                                                <?php 
                                                    if($row['associative_editor_status']==0)
                                                    {
                                                        ?>
                                                            <td class = "text-danger fw-bold">Inactive</td>
                                                            <td>
                                                                <input type="hidden" name = "id" value = "<?php echo $row['id'] ?>">
                                                                <input type="hidden" name = "email" value = "<?php echo $row['associative_editor_email'] ?>">
                                                                <input class = "btn btn-success fw-bold" type="submit" name = "active" value = "Active">
                                                            </td>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <td class = "text-success fw-bold">Active</td>
                                                            <td>
                                                                <input type="hidden" name = "id" value = "<?php echo $row['id'] ?>">
                                                                <input type="hidden" name = "email" value = "<?php echo $row['associative_editor_email'] ?>">
                                                                <input class = "btn btn-danger fw-bold" type="submit" name = "inactive" value = "In-active">
                                                            </td>
                                                        <?php 
                                                    }
                                                ?>
                                                </form>
                                            </tr>
                                        <?php 
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
<?php 
    if(isset($_POST['active']))
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $update_ass_editor_info = "UPDATE `associative_editor_information` SET `associative_editor_status` = '1' WHERE `id` = '$id'";
        $run_update_ass_editor_info = mysqli_query($conn, $update_ass_editor_info);
        if($run_update_ass_editor_info)
        {
            $receiver = $email;
            $subject = "Approval as an Associative Editor";
            $body = '<h5>Dear Sir/Madam, <br /> Your request to register as an associative editor has been accepted. You can now login to the site.<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);
        }
        ?>
            <script>
                window.alert("A Mail Has Been Sent To The Associative Editor");
                window.location = "associative_editors_info_m_e.php";
            </script>
        <?php 
    }
    else if(isset($_POST['inactive']))
    {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $update_ass_editor_info = "UPDATE `associative_editor_information` SET `associative_editor_status` = '0' WHERE `id` = '$id'";
        $run_update_ass_editor_info = mysqli_query($conn, $update_ass_editor_info);
        if($run_update_ass_editor_info)
        {
            $receiver = $email;
            $subject = "Banned as an Associative Editor";
            $body = '<h5>Dear Sir/Madam, <br /> You have been suspended to work as an associative editor.<br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
            $send_mail = send_mail($receiver, $subject, $body);
        }
        ?>
            <script>
                window.alert("A Mail Has Been Sent To The Associative Editor");
                window.location = "associative_editors_info_m_e.php";
            </script>
        <?php 
    }
    
?>