<?php include('header.php')?>
<?php 
    if(isset($_GET['volume_info']) && isset($_GET['issue_info']))
    {
        // volume_and_issue_validation_qry
        
        $select_new_paper = "SELECT * FROM `new_paper` WHERE `volume_info` = '$_GET[volume_info]' AND `issue_info` = '$_GET[issue_info]' AND `published_status` = '1' ORDER BY `updated_at` DESC";
        
        $run_select_new_paper = mysqli_query($conn, $select_new_paper);
        if(mysqli_num_rows($run_select_new_paper)==0)
        {
            ?>
                <script>
                    window.alert("No Papers Found Of This Volume and Issue!!");
                    window.location = "previous_issues.php";
                </script>
            <?php
            exit();
        }
    }
    else
    {
        ?>
            <script>
                window.alert("Invalid Issue");
                window.location = "previous_issues.php";
            </script>
        <?php
        exit();
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center">
                <h3 class = "text-danger fw-bold"><i>All Papers of <?php echo $_GET['volume_info'] ?>, <?php echo $_GET['issue_info'] ?></i></h3>
            </div>
            
            <div class="card-body">
                <div class="row">
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
                    <?php 
                        if(isset($_POST['search']))
                        {
                            $paper_title = $_POST['search_paper_title_wise'];
                            if($paper_title!=NULL)
                            {
                                // published_status = 0 mane paper published hoy nai
                                $select_new_paper = "SELECT * FROM `new_paper` WHERE `paper_title` like '%$paper_title%' AND `volume_info` = '$_GET[volume_info]' AND `issue_info` = '$_GET[issue_info]' AND `published_status` = '1' ORDER BY `updated_at` DESC";
                            }
                            else
                            {
                                ?>
                                <script>
                                    window.alert("Please Select At least 1 field");
                                    window.location = "all_paper_issue_wise.php?issue=<?php echo$_GET['issue'] ?>";
                                </script>
                                <?php
                            }
                            
                        }
                        else
                        {
                            $select_new_paper = "SELECT * FROM `new_paper` WHERE `volume_info` = '$_GET[volume_info]' AND `issue_info` = '$_GET[issue_info]' AND `published_status` = '1' ORDER BY `updated_at` DESC";
                        }
                        $run_select_new_paper = mysqli_query($conn, $select_new_paper);
                        while($row = mysqli_fetch_assoc($run_select_new_paper))
                        {
                            ?>
                            <div class="col-lg-4 col-md-4 col-12 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class = "text-center mb-3">Paper Title: <?php echo $row['paper_title']?></h4>
                                    </div>
                                    
                                    <div class="card-body">
                                        <p style = "text-align:justify"><?php echo $row['paper_abstract']?></p>
                                    </div>
                                    <a class = "btn btn-dark fw-bold " href="view_details_user.php?id=<?php echo $row['id'] ?>">View Details</a>
                                </div>
                            </div>
                            <?php 
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>