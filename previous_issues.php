<?php include('header.php')?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center">
                <h3 class = "text-danger fw-bold"><i>All Volumes & Issues</i></h3>
            </div>
            
            <div class="card-body">
            
                <?php 
                    $find_all_volumes_and_issues = ""SELECT `volume_info`, `issue_info`, COUNT(*) AS total_papers FROM `new_paper` WHERE (`volume_info` != '' OR `issue_info` != '') GROUP BY `volume_info`, `issue_info`";
                    $run_find_all_volumes_and_issues = mysqli_query($conn, $find_all_volumes_and_issues);
                    
                    if(mysqli_num_rows($run_find_all_volumes_and_issues)>0)
                    {
                        ?>
                        <div class="row justify-content-center">
                            <?php 
                                $i=1;
                                while($row = mysqli_fetch_assoc($run_find_all_volumes_and_issues))
                                {
                                    // jdi kono paper er volume or issue jdi null thake tkhn sei volume ar iss
                                    
                                    if($i%2==0)
                                    {
                                        $bg_color = "bg-success";
                                    }
                                    else
                                    {
                                        $bg_color = "bg-primary";
                                    }
                                    ?>
                                    
                                    <div class="col-lg-4 col-md-4 col-12 mt-3 ">
                                        <div class="card">
                                            <div class="card-header <?php echo $bg_color ?> text-white">
                                                <h5 class = "text-center">Volume Number: <span style = "color: yellow"><?php echo $row['volume_info']?></span></h5>
                                                <h5 class = "text-center">Issue Number: <span style = "color: yellow"><?php echo $row['issue_info'] ?></span></h5>
                                            </div>
                                            <a class = "btn btn-dark fw-bold " href="all_papers_volume_issue_wise.php?volume_info=<?php echo $row['volume_info'] ?>&issue_info=<?php echo $row['issue_info'] ?>">View Details</a>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                            ?>
                        </div>
                        <?php
                        
                    }
                    else
                    {
                        echo "<h1 class = 'text-center text-danger' >No Volumes and Issues Found</h1>";
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>
<?php include('footer.php')?>
