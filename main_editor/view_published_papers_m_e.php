<?php include('main_editor_header.php')?>
<?php include('mail_sending.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <div class="row justify-content-center">
                        <h3 class = "text-center text-secondary fw-bold">All Published Papers</h3>     
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method = "POST">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-4 col-12 mb-3">
                                <div class="input-group input-group-sm mt-1">
                                    <div class="input-group-prepend">
                                        <span class = "input-group-text "><i class="fa-solid fa-magnifying-glass "></i></span>
                                    </div>
                                    <input type="text" class = "form-control" name = "search_paper_title_wise" id = "search_paper_title_wise" placeholder="Search By Title....." value = "<?php
                                    if(isset($_POST['show_all']))
                                    {
                                        echo "";
                                    }
                                    else if(isset($_POST['search_paper_title_wise']))
                                    {
                                        echo "$_POST[search_paper_title_wise]";
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
                                    <th>Serial No</th>
                                    <th>Paper Title</th>
                                    <th>Published Date</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST['search']))
                                    {
                                        $paper_title = $_POST['search_paper_title_wise'];
                                        if($paper_title!=NULL)
                                        {
                                            // published_status = 0 mane paper published hoy nai
                                            $select_accepted_paper_info = "SELECT * FROM `new_paper` WHERE `paper_title` like '%$paper_title%' AND `paper_status` = '100' AND `published_status` = '1' ORDER BY `id` DESC";
                                        }
                                        else
                                        {
                                            ?>
                                            <script>
                                                window.alert("Please Select At least 1 field");
                                                window.location = "publish_paper_m_e.php";
                                            </script>
                                            <?php
                                        }
                                        
                                    }
                                    else
                                    {
                                        // published_status = 0 mane paper published hoy nai
                                        $select_accepted_paper_info = "SELECT * FROM `new_paper` WHERE `paper_status` = '100' AND `published_status` = '1' ORDER BY `id` DESC";
                                    }
                                    
                                    $run_select_accepted_paper_info = mysqli_query($conn, $select_accepted_paper_info);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_accepted_paper_info))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $serial_no?></td>
                                                <td><?php echo $row['paper_title']?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row['updated_at']))?></td>
                                                <td><a href="view_paper_details_m_e.php?paper_id=<?php echo $row['paper_id'] ?>" class = "btn btn-primary fw-bold">View Details</a></td>
                                                <td class = "text-success fw-bold"><?php echo "Published"?></td>
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
