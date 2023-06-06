<?php include('header.php')?>
<?php 
    // last paper ta je issue, and volume e publish hoise oi volume and issue er sokol paper show korte hobe. seta select korar jonno update_at column use korte hobe. karon ekbar paper publish hoye gele tar update_at ar change hobe na.
    $select_new_paper = "SELECT * FROM `new_paper` WHERE `published_status` = '1' AND issue_info = (SELECT issue_info FROM `new_paper` WHERE `published_status` = '1' ORDER BY `updated_at` DESC LIMIT 1) AND volume_info = (SELECT volume_info FROM `new_paper` WHERE `published_status` = '1' ORDER BY `updated_at` DESC LIMIT 1) ";
    $run_select_new_paper = mysqli_query($conn, $select_new_paper);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header text-center">
                <h3 class = "text-danger fw-bold"><i>All Papers of Current Volume and Issue <span id = "volume_issue"></span></i></h3>
            </div>
            
            <div class="card-body">
                <div class="row justify-content-center">
                    <?php 
                        $issue_info = "";
                        $volume_info = "";
                        while($row = mysqli_fetch_assoc($run_select_new_paper))
                        {
                            $issue_info = $row['issue_info'];
                            $volume_info = $row['volume_info'];
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

<script>
    document.getElementById("volume_issue").innerHTML = "<?php  echo "(".$volume_info.", ".$issue_info.")"?>";
</script>

