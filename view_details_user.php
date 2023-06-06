<?php include('header.php')?>
<?php 
    if(isset($_GET['id']))
    {
        // id_validation_qry
        $select_new_paper = "SELECT * FROM `new_paper` WHERE `id` = '$_GET[id]' AND `published_status` = '1'";
        $run_select_new_paper = mysqli_query($conn, $select_new_paper);
        $row_select_paper = mysqli_fetch_assoc($run_select_new_paper);
        
        if($row_select_paper==false)
        {
            ?>
                <script>
                    window.alert("Invalid ID");
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
                window.alert("Invalid ID");
                window.location = "previous_issues.php";
            </script>
        <?php
        exit();
    }
    
    // multiple co-author jdi thake tahole tader ke age explode kore array te diye dei.
    if($row_select_paper['authors_name']!="")
    {
        $all_author_name = explode(",", $row_select_paper['authors_name']);
        $all_author_affiliation = explode(",", $row_select_paper['authors_affiliation']);
        $all_author_designation = explode(",", $row_select_paper['authors_designation']);
        $all_author_email = explode(",", $row_select_paper['authors_email']);
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center">
                <h3 class = "text-danger fw-bold"><i>Complete Details</i></h3>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class = "table table-bordered text-center">
                        <tr>
                            <th width = "30%">Paper Title:</th>
                            <td colspan = "4"><?php echo $row_select_paper['paper_title']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Paper Abstract:</th>
                            <td colspan = "4"><?php echo $row_select_paper['paper_abstract']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Paper Keywords:</th>
                            <td colspan = "4"><?php echo $row_select_paper['paper_keywords']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Paper Type:</th>
                            <td colspan = "4"><?php echo $row_select_paper['paper_type']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Volume:</th>
                            <td colspan = "4"><?php echo $row_select_paper['volume_info']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Issue:</th>
                            <td colspan = "4"><?php echo $row_select_paper['issue_info']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Paper Type:</th>
                            <td colspan = "4"><?php echo $row_select_paper['paper_type']?></td>
                        </tr>
                        
                        <tr>
                            <th width = "30%" rowspan = "3">Files View/Download:</th>
                            <tr>
                                <td class = "fw-bold">Image:</td>
                                <td class = "fw-bold">Manuscript:</td>
                                <td class = "fw-bold">Cover Letter:</td>
                                <td class = "fw-bold">Supplimentary:</td>
                            </tr>
                            <tr>
                            <?php 
                                if($row_select_paper['manuscript_image']==NULL)
                                {
                                    ?>
                                        <td>--</td>
                                    <?php 
                                }
                                else
                                {
                                    ?>
                                    <td><img src="author/image_for_paper/<?php echo $row_select_paper['manuscript_image'] ?>" width = "50 px" height = "50px" alt="No_Image"></td>
                                    <?php 
                                }
                            ?>
                                <td><a class = "" href="download_file_user.php?paper_id=<?php echo $row_select_paper['paper_id'] ?>&type=manuscript&file=<?php echo $row_select_paper['manuscript_pdf']?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a></td>
                                
                                <td><a class = "" href="download_file_user.php?paper_id=<?php echo $row_select_paper['paper_id'] ?>&type=cover_letter&file=<?php echo $row_select_paper['cover_letter_pdf']?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a></td>
                                
                                <td><a class = "" href="download_file_user.php?paper_id=<?php echo $row_select_paper['paper_id'] ?>&type=supplimentary_file&file=<?php echo $row_select_paper['supplimentary_file']?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a></td>
                            
                            </tr>
                        </tr>
                        
                        <tr>
                            <th width = "30%">Author Information:</th>
                            <!-- select author_information -->
                            <?php 
                                $select_author_information = "SELECT * FROM `author_information` WHERE `id` = '$row_select_paper[author_id]'";
                                $run_select_author_information = mysqli_query($conn, $select_author_information);
                                $res_select_author_information = mysqli_fetch_assoc($run_select_author_information);
                            ?>
                            <td><?php echo $res_select_author_information['author_name']?></td>
                            <td><?php echo $res_select_author_information['author_university_name']?></td>
                            <td><?php echo $res_select_author_information['author_designation']?></td>
                            <td><?php echo $res_select_author_information['author_email']?></td>
                        </tr>
                        
                        <tr>
                            <!-- joto gula co-author ache tar theke ekta besi rowspan korte hoy -->
                            <th width = "30%" rowspan = "<?php echo sizeof($all_author_name)+1 ?>" >Co-Authors Information</th>
                            <?php 
                                
                                // sob author er information gula comma diye store kora ache. oigula ke show koranor jonno array te nite hobe.
                                if($row_select_paper['authors_name']!="")
                                {
                                    for($k=0;$k<sizeof($all_author_name);$k++)
                                    {
                                        ?>
                                            <tr >
                                                <td><?php echo $all_author_name[$k]?></td>
                                                <td><?php echo $all_author_affiliation[$k]?></td>
                                                <td><?php echo $all_author_designation[$k]?></td>
                                                <td><?php echo $all_author_email[$k]?></td>
                                            </tr>
                                        
                                        <?php 
                                    }
                                }
                                else
                                {
                                    ?>
                                        <!-- jdi kono data na thake tahole 4ta column ke ekotre korar jonno colspan use kora hoise -->
                                        <td colspan = "4"></td>
                                    <?php 
                                }
                            
                            ?>
                            
                            
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>