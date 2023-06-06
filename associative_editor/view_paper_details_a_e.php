<?php include('associative_editor_header.php')?>
<?php 
    if(isset($_GET['paper_id']) && isset($_GET['associative_editor_id']) && $_GET['paper_id']!=NULL && $_GET['associative_editor_id']!=NULL)
    {
        // new_papers_a_e theke asle sekhane sob paper ache tai associative_editor_id er man 0 hobe. 0 mane ekhno associative_editor assign hoy nai and paper_status = 1 ache. ar onno jayga theke eikhane redirect hole value 1 hobe. 1 mane sudhu particular oi associative_editor er paper gulo niye kaj korbo.
        if($_GET['associative_editor_id']==0)
        {
            $paper_id_validation = "SELECT * FROM `new_paper` WHERE `paper_id` = '$_GET[paper_id]' AND `paper_status` = '1' AND `associative_editor_id` = ''";
        }
        else if($_GET['associative_editor_id']==1)
        {
            $paper_id_validation = "SELECT * FROM `new_paper` WHERE `paper_id` = '$_GET[paper_id]' AND `associative_editor_id` = '$_SESSION[associative_editor_id]'";
        }
        else
        {
            ?>
                <script>
                    window.alert("Invalid!!");
                    window.location = "index.php";
                </script>
            <?php 
            exit();
        }
        $run_paper_id_validation = mysqli_query($conn, $paper_id_validation);
        $num_rows_paper_id = mysqli_num_rows($run_paper_id_validation);
        if($num_rows_paper_id==0)
        {
            ?>
                <script>
                    window.alert("Invalid Paper Id!!");
                    window.location = "index.php";
                </script>
            <?php 
            exit();
        }
    }
    else
    {
        ?>
        <script>
            window.alert("Paper Id Missing!!");
            window.location = "index.php";
        </script>
        <?php 
        exit();
    }
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Paper Information</h3>
                </div>
                <?php 
                    $i=1;
                    while($row = mysqli_fetch_assoc($run_paper_id_validation))
                    {
                        if($num_rows_paper_id>1)
                        {
                            echo "<h3 class = 'text-center text-danger mt-2'>Submission Number: $i</h3>";
                            $i++;
                        }
                        ?>
                        <div class="card-body">   
                            <div class="row justify-content-center">
                            <?php 
                                $paper_id = $_GET['paper_id'];
                                $main_author_id = $row['author_id'];
                                
                                $reviewer_id = $row['reviewer_id'];
                                $paper_title = $row['paper_title'];
                                $paper_abstract = $row['paper_abstract'];
                                $paper_keywords = $row['paper_keywords'];
                                $paper_type = $row['paper_type'];
                                $authors_name = $row['authors_name'];
                                $authors_affiliation = $row['authors_affiliation'];
                                $authors_designation = $row['authors_designation'];
                                $authors_email = $row['authors_email'];
                                $manuscript_pdf = $row['manuscript_pdf'];
                                $cover_letter_pdf = $row['cover_letter_pdf'];
                                $manuscript_image = $row['manuscript_image'];
                                $supplimentary_file = $row['supplimentary_file'];
                                $paper_status = $row['paper_status'];
                                $count = $row['count'];
                            ?>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="card">
                                        <div class="card-header ">
                                            <label for=""><b>Paper Title:</b></label>
                                        </div>
                                        <div class="card-body">
                                        <h6><?php echo $paper_title ?></h6>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for=""><b>Paper Type:</b></label>
                                        </div>
                                        <div class="card-body">
                                        <h6><?php echo $paper_type ?></h6>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for=""><b>Paper Keywords:</b></label>
                                        </div>
                                        <div class="card-body">
                                        <!-- paper keyword comma diye separate kora ache oigula ke ekta ekta kore dekhate hobe -->
                                        <?php 
                                            $all_keywords = explode(",", $paper_keywords);
                                            for($j=0;$j<sizeof($all_keywords);$j++)
                                            {
                                               ?>
                                                <h6><?php echo $j+1..".".$all_keywords[$j] ?></h6>
                                               <?php 
                                            }
                                        ?>
                                        
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <label for=""><b>Paper Abstract:</b></label>
                                        </div>
                                        <div class="card-body" style = "text-align:justify">
                                        <h6><?php echo $paper_abstract ?></h6>
                                        </div>
                                    </div>    
                                </div>
                                
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <label for=""><b>Authors Information:</b></label>
                                        </div>
                                        <div class="card-body" style = "text-align:justify">
                                            <table class="table table-responsive table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Name</th>
                                                        <th>Affiliation</th>
                                                        <th>Designation</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        // sob author er information gula comma diye store kora ache. oigula ke show koranor jonno array te nite hobe.
                                                        if($authors_name!="")
                                                        {
                                                            $all_author_name = explode(",", $authors_name);
                                                            $all_author_affiliation = explode(",", $authors_affiliation);
                                                            $all_author_designation = explode(",", $authors_designation);
                                                            $all_author_email = explode(",", $authors_email);
                                                            
                                                            for($k=0;$k<sizeof($all_author_name);$k++)
                                                            {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $k+1?></td>
                                                                        <td><?php echo $all_author_name[$k]?></td>
                                                                        <td><?php echo $all_author_affiliation[$k]?></td>
                                                                        <td><?php echo $all_author_designation[$k]?></td>
                                                                        <td><?php echo $all_author_email[$k]?></td>
                                                                    </tr>
                                                                <?php 
                                                            }
                                                        }
                                                        
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <label for=""><b>Files To Download:</b></label>
                                        </div>
                                        <div class="card-body" style = "text-align:justify">
                                            <table class="table table-responsive table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Manuscript Image</th>
                                                        <th>Manuscript File</th>
                                                        <th>Cover Letter File</th>
                                                        <th>Supplimentary File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if($manuscript_image==NULL)
                                                        {
                                                            ?>
                                                                <td>--</td>
                                                            <?php 
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <td><img src="../author/image_for_paper/<?php echo $manuscript_image ?>" width = "50 px" height = "50px" alt="No_Image"></td>
                                                            <?php 
                                                        }
                                                    ?>
                                                    <td> 
                                                        <a class = "" href="download_file_a_e.php?paper_id=<?php echo $_GET['paper_id'] ?>&type=manuscript&file=<?php echo $manuscript_pdf?>&associative_editor_id=<?php echo $_GET['associative_editor_id'] ?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a>
                                                    </td>
                                                    
                                                    <td> 
                                                        <a class = "" href="download_file_a_e.php?paper_id=<?php echo $_GET['paper_id'] ?>&type=cover_letter&file=<?php echo $cover_letter_pdf?>&associative_editor_id=<?php echo $_GET['associative_editor_id'] ?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a>
                                                    </td>
                                                    
                                                    <td> 
                                                        <a class = "" href="download_file_a_e.php?paper_id=<?php echo $_GET['paper_id'] ?>&type=supplimentary_file&file=<?php echo $supplimentary_file?>&associative_editor_id=<?php echo $_GET['associative_editor_id'] ?>"><i class="fa-solid fa-file-arrow-down fa-2x"></i></a>
                                                    </td>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>    
                                </div>
                                
                                <!-- Start: Main Author and Reviewer Name -->
                                <?php 
                                    $select_author_information = "SELECT * FROM `author_information` WHERE `id` = '$main_author_id'";
                                    $run_select_author_information = mysqli_query($conn, $select_author_information);
                                    $res_select_author_information = mysqli_fetch_assoc($run_select_author_information);
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="card ">
                                            <div class="card-header">
                                                <label for=""><b>Main Author Info:</b></label>
                                            </div>
                                            <div class="card-body" style = "text-align:justify">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>University</th>
                                                            <th>Designation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $res_select_author_information['author_name'] ?></td>
                                                            <td><?php echo $res_select_author_information['author_university_name']?></td>
                                                            <td><?php echo $res_select_author_information['author_designation']?></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
                                    </div>
                                <?php 

                                if($reviewer_id!=NULL)
                                {
                                
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="card ">
                                            <div class="card-header">
                                                <label for=""><b>Reviewers Info:</b></label>
                                            </div>
                                            <div class="card-body" style = "text-align:justify">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial</th>
                                                            <th>Name</th>
                                                            <th>University</th>
                                                            <th>Designation</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    // joto gula reviewer ache sob gula ekta ekta kore reviewer_information and reviewer_comment theke merge kore tader information and comment gula niye aste hobe.
                                                    $all_reviewer_id = explode(",",$reviewer_id);
                                                     
                                                    for($j=0;$j<sizeof($all_reviewer_id);$j++)
                                                    {
                                                        ?>
                                                        <tr>
                                                        <?php 
                                                        // first e reviewr er info nibo then reviewer er comment nibo. 2ta alada query hobe
                                                        // Start: reviewer_info
                                                        $select_reviewer_info = "SELECT * FROM `reviewer_information` WHERE `id` = '$all_reviewer_id[$j]'";
                                                        $run_select_reviewer_info = mysqli_query($conn, $select_reviewer_info);
                                                        $res_select_reviewer_info = mysqli_fetch_assoc($run_select_reviewer_info);
                                                        // End: reviewer_info
                                                        
                                                        // show reviewer_info
                                                            ?>
                                                            <td><?php echo $j+1?></td>
                                                            <td><?php echo $res_select_reviewer_info['reviewer_name']?></td>
                                                            
                                                            <td><?php echo $res_select_reviewer_info['reviewer_university_name']?></td>
                                                            
                                                            <td><?php echo $res_select_reviewer_info['reviewer_designation']?></td>
                                                            <?php 
                                                        // Start: reviewer_cmnt
                                                        $select_reviewer_cmnt = "SELECT * FROM `reviewer_comment` WHERE `paper_id` = '$paper_id' AND `reviewer_id` = '$all_reviewer_id[$j]' AND `count` = '$count'";
                                                        $run_select_reviewer_cmnt = mysqli_query($conn, $select_reviewer_cmnt);
                                                        $res_select_reviewer_cmnt = mysqli_fetch_assoc($run_select_reviewer_cmnt);
                                                        // End: reviewer_cmnt
                                                        
                                                        if($res_select_reviewer_cmnt==false)
                                                        {
                                                            ?>
                                                                <td>--</td>
                                                            <?php 
                                                        }
                                                        else
                                                        {
                                                            // comment 2 dhoroner ache . 1ta hocche option jeta sobsomy thakbe kintu commnt ta hocche opttional tai nao thakte pare.
                                                            if($res_select_reviewer_cmnt['comments']=='')
                                                            {
                                                                ?>
                                                                    <td>1. <?php echo $res_select_reviewer_cmnt['options']?></td>
                                                                <?php 
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <td>
                                                                    1. <?php echo $res_select_reviewer_cmnt['options']?> <br> 
                                                                    2. <?php echo $res_select_reviewer_cmnt['comments']?>
                                                                    </td>
                                                                <?php                                                       
                                                            }
                                                             
                                                        }
                                                        
                                                       ?>
                                                        </tr>
                                                       <?php 
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>    
                                    </div>
                                
                                    <?php 
                                }
                                ?>
                                                  
                                <!-- jdi paper publish hoy tahole nicher info show korbe -->
                                <?php 
                                    if($row['published_status']==1)
                                    {
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <label for=""><b>Published Volume:</b></label>
                                                </div>
                                                <div class="card-body" style = "text-align:justify">
                                                <h6><?php echo $row['volume_info'] ?></h6>
                                                </div>
                                            </div>    
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <label for=""><b>Published Issue:</b></label>
                                                </div>
                                                <div class="card-body" style = "text-align:justify">
                                                <h6><?php echo $row['issue_info'] ?></h6>
                                                </div>
                                            </div>    
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <label for=""><b>Paper Status:</b></label>
                                                </div>
                                                <div class="card-body" style = "text-align:justify">
                                                <h6 class = "text-success fw-bold"><?php echo "Published"?></h6>
                                                </div>
                                            </div>    
                                        </div>
                                        <?php 
                                    }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <?php 
                    }
                ?>  
            </div>
        </div>
    </div>
</div>
<?php include('associative_editor_footer.php')?>