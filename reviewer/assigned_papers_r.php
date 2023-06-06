<?php include('reviewer_header.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">All Assigned Papers</h3>
                    
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
                                    <th>Last Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE  `paper_status` = '4' OR `paper_status` = '5'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        // new_paper table e onk reviewer_id thake. oita ke array te convert kore then in_array diye search korbo. tar fole je reviewer login korse se sudhu take assign kora paper dekhte parbe.
                                        
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $serial_no;?></td>
                                                <td><?php echo $row['paper_title']?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row['created_at']))?></td>
                                                <td><a class = "form-control btn btn-primary fw-bold" href="view_paper_details_r.php?paper_id=<?php echo $row['paper_id']?>&r_id=<?php echo $row['reviewer_id'] ?>">View Details</a></td>
                                                <?php 
                                                    if($row['count']==1)
                                                    {
                                                        ?>
                                                            <td class = "text-secondary fw-bold">
                                                                New Paper
                                                            </td>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <td class = "text-secondary fw-bold">
                                                                Re-Submitted Paper
                                                            </td>
                                                        <?php
                                                    }
                                                ?>
                                                <td>
                                                <?php 
                                                    if($row['paper_status']==4 || $row['paper_status']==5)
                                                    {
                                                        // multiple reviewer thakle status 4 hok or 5 hok start review dekhabe. jara start review button click kore dibe tader kache Decision namer button dekhabe. ar jara kore nai tader kache start_processing button dekhabe.
                                                        // new_paper er paper_id er sathe reviewer_comment er paper_id match korbe.
                                                        
                                                        $select_reviewer_comment = "SELECT `id` FROM `reviewer_comment` WHERE `paper_id` = '$row[paper_id]' AND `reviewer_id` = '$_SESSION[reviewer_id]' AND `count` = '$row[count]'";
                                                        $run_select_reviewer_comment = mysqli_query($conn, $select_reviewer_comment);
                                                        
                                                        $num_rows_reviewer = mysqli_num_rows($run_select_reviewer_comment);
                                                        
                                                        if($num_rows_reviewer==0)
                                                        {
                                                            ?>
                                                            <form action="" method = "POST">
                                                                <!-- id = new_paper table er auto increment value -->
                                                                <!-- paper_id = new_paper table er paper_id col er value -->
                                                                <!-- count = new_paper table er count col er value -->
                                                                <input type="hidden" name = "id_new_paper" value = "<?php echo $row['id'] ?>">
                                                                <input type="hidden" name = "paper_id_new_paper" value = "<?php echo $row['paper_id'] ?>">
                                                                <input type="hidden" name = "count_from_new_paper" value = "<?php echo $row['count'] ?>">
                                                                
                                                                <input type="submit" class = "form-control btn btn-dark fw-bold" name = "start_processing" value ="Start Review">
                                                            </form>
                                                         <?php 
                                                        }
                                                        else
                                                        {
                                                            //
                                                            ?>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="form-control btn btn-info fw-bold" data-bs-toggle="modal"  data-bs-target="#decision<?php echo $row['id'] ?>">
                                                                Decision
                                                            </button>
                                                            
                                                             <!--  bootstrap modal to comment -->
                                                            <div class="modal fade" id="decision<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="decision" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    
                                                                        <!-- modal header -->
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="decision">Take Your Decision</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                               
                                                                       <form action="" method = "POST">
                                                                            <input type="hidden" name = "paper_id_new_paper" value = "<?php echo $row['paper_id'] ?>">
                                                                            
                                                                            <input type="hidden" name = "count_from_new_paper" value = "<?php echo $row['count']?>">
                                                                            <!-- modal body -->
                                                                            <div class="modal-body">
                                                                                <h6 style = "text-align:left">Please Select Your Opinion: <strong class = "text-danger">*</strong></h6>
                                                                                
                                                                                <select class = "form-control" name="options" id="" required>
                                                                                    <option value="" selected>Please Select Your Opinion</option>
                                                                                    <option value="Required Major Revision">Required Major Revision</option>
                                                                                    <option value="Required Minor Revision">Required Minor Revision</option>
                                                                                    <option value="Accept">Accept</option>
                                                                                    <option value="Reject">Reject</option>
                                                                                </select>
                                                                                
                                                                                <!-- comment box -->
                                                                                <h6 style = "text-align:left" class = "mt-3" for="">Please Put Your Comment:</h6>
                                                                                <textarea  name="comments" id="" cols="30" rows="10"></textarea>
                                                                            </div>
                                                                            
                                                                            <!-- modal footer -->
                                                                            <div class="modal-footer">
                                                                                <input type="submit" class = "btn btn-danger" name = "submit_decision" value = "Submit">
                                                                            </div>
                                                                       </form>        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php 
                                                        }
                                                    }
               
                                                ?>
                                                </td>
                                                <td>
                                                    <!-- Last Comment Modal (last je comment korsilo seta dekhabe) -->
                                                    <!-- Button trigger modal -->
                                                    <?php 
                                                    // jdi reviewer start_processing button e click na kore thake tahole View Last Comment Button Dekhabo na
                                                    if($num_rows_reviewer!=0)
                                                    {
                                                        ?>
                                                        <button type="button" class="form-control btn btn-warning fw-bold" data-bs-toggle="modal"  data-bs-target="#lastComment<?php echo $row['id'] ?>">
                                                        View Last Comment
                                                        </button>
                                                        
                                                         <!--  bootstrap modal to View last comment -->
                                                        <div class="modal fade" id="lastComment<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="lastComment" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                
                                                                    <!-- modal header -->
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="lastComment">Your Last Decision</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                   
                                                                    <!-- modal body -->
                                                                    <div class="modal-body">
                                                                        <?php 
                                                                            // je reviewr login korse ebong se jetar last comment dekhte chacche seta select korchi.
                                                                            $select_my_comment = "SELECT `options`, `comments` FROM `reviewer_comment` WHERE `paper_id` = '$row[paper_id]' AND `reviewer_id` = '$_SESSION[reviewer_id]' AND `count` = '$row[count]'";
                                                                            
                                                                            $run_select_my_comment = mysqli_query($conn, $select_my_comment);
                                                                            
                                                                            $row_my_comment = mysqli_fetch_assoc($run_select_my_comment);
                                                                            ?>
                                                                            <!-- options -->
                                                                            <div style = "text-align:left">
                                                                                <h5 for="">Your Last Opinion:</h5>
                                                                                <p><?php echo $row_my_comment['options']?></p>
                                                                            </div>
                                                                            <hr>
                                                                            <!-- comments -->
                                                                            <div style = "text-align:left">
                                                                                <h5 for="">Your Last Comment:</h5>
                                                                                <p><?php echo $row_my_comment['comments']?></p>
                                                                            </div>
                                                                            <?php 
                                                                        ?>
                                                                    </div>                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                    }
                                                    else
                                                    {
                                                        echo "--";
                                                    }
                                                    ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                            $serial_no++;
                                        }
                                        
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
    if(isset($_POST['start_processing']))
    {
        // id = new_paper table er auto increment value
        // paper_id = new_paper table er paper_id col er value
        // count = new_paper table er count col er value
        
        $id_new_paper = $_POST['id_new_paper'];
        $paper_id_new_paper = $_POST['paper_id_new_paper'];
        $count_new_paper = $_POST['count_from_new_paper'];
        
        // jehetu processing start hoyse tai paper_status = 5 hobe
        $paper_status = 5;
        
        $update_paper_info = "UPDATE `new_paper` SET `paper_status` = '$paper_status' WHERE `id` = '$id_new_paper'";
        $run_update_paper_info = mysqli_query($conn, $update_paper_info);
      
        if($run_update_paper_info)
        {
            // processing start hole reviewer_comment table e ei reviewer er id entry korbe.
            $insert_reviewer_comment = "INSERT INTO `reviewer_comment`(`paper_id`, `reviewer_id`, `options`, `comments`, `count`) VALUES ('$paper_id_new_paper','$_SESSION[reviewer_id]','','','$count_new_paper')";
            $run_insert_reviewer_comment = mysqli_query($conn, $insert_reviewer_comment);
            
            if($run_insert_reviewer_comment)
            {
                ?>
                    <script>
                        window.alert("Reviewing Process Started");
                        window.location = "assigned_papers_r.php";
                    </script>
                <?php 
            }
        }
    }
    
    if(isset($_POST['submit_decision']))
    {
        $paper_id_new_paper = $_POST['paper_id_new_paper'];
        $count_new_paper = $_POST['count_from_new_paper'];
        $options = $_POST['options'];
        $comments = $_POST['comments'];
        
        $update_reviewer_comment = "UPDATE `reviewer_comment` SET `options` = '$options', `comments` = '$comments' WHERE `paper_id` = '$paper_id_new_paper' AND `reviewer_id` = '$_SESSION[reviewer_id]' AND `count` = '$count_new_paper'";
        $run_update_reviewer_comment = mysqli_query($conn, $update_reviewer_comment);
        
        if($run_update_reviewer_comment)
        {
            ?>
                <script>
                    window.alert("Thanks for your valuable decision!")
                    window.location = "assigned_papers_r.php";
                </script>
            <?php 
        
        }
        
        
    }
?>
<?php include('reviewer_footer.php')?>