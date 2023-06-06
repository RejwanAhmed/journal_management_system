<?php
    session_start();
    include("db_connection.php");
    if(!isset($_SESSION['author_id']))
    {
      ?>
        <script>
          window.location = "../index.php";
        </script>
      <?php
      exit();
    }
    $count_error = 0;
    if(isset($_GET['type']) && isset($_GET['file']) && isset($_GET['paper_id']))
    {
        if($_GET['type']=='manuscript' || $_GET['type'] == 'cover_letter' || $_GET['type']=='supplimentary_file')
        {
            // search whether file is valid or not.
            if($_GET['type']=="manuscript")
            {
                $column_name = "manuscript_pdf";
            }
            else if($_GET['type']=="cover_letter")
            {
                $column_name = "cover_letter_pdf";
            }
            else 
            {
                $column_name = "supplimentary_file";
            }
            $paper_id_validation = "SELECT * FROM `new_paper` WHERE `paper_id` = '$_GET[paper_id]' AND `author_id` = '$_SESSION[author_id]' AND `$column_name` = '$_GET[file]'";
            $run_paper_id_validation = mysqli_query($conn, $paper_id_validation);
            $num_paper_id = mysqli_num_rows($run_paper_id_validation);
            if($num_paper_id>0)
            {   
                // Start: for downloading file
                if($_GET['type']=="manuscript")
                {
                    $file_path = "document_for_manuscript/".$_GET['file'];
                    header("Content-Disposition: attachment; filename=Manuscript_".$_GET['file']);
                }
                else if($_GET['type']=="cover_letter")
                {
                    $file_path = "document_for_cover_letter/".$_GET['file'];
                    header("Content-Disposition: attachment; filename=Cover Letter_".$_GET['file']);
                }
                else
                {
                    $file_path = "document_for_supplimentary_file/".$_GET['file'];
                    header("Content-Disposition: attachment; filename=Supplimentary File_".$_GET['file']);
                }
                header("Content-Type: application/pdf");
                readfile($file_path);
                // End: for downloading file
            }
            else
            {
                $count_error++;
            }
        }
        else
        {
           $count_error++;
           
        }
    }
    else
    {
        $count_error++;
        
    }
    if($count_error>0)
    {
        ?>
        <script>
            window.alert("Invalid File");
            window.location = "index.php";
        </script>
        <?php 
        exit();
    }
   
?>