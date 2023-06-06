<?php include 'header.php'?>
<div class="container-fluid">
    <div class="row">
        <img src="img/NNJ.jpg" alt="" style = "width:100%; height: 400px;">
    </div>
</div>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-12 col-12">
            <div class = "card shadow-lg">
                <div class="card-body text-justify">
                    <div class="card-header">
                        <h3 class = "text-center">About Online Management Of Nazrul Studies Journal</h3>
                    </div>
                    <div class="card-body" style = "text-align:justify">
                        <p>
                            The existing system of  the Nazrul Stadies Journal management  is tediou process. Up to now there is no extensible software availability for this process. The existing system is run manually by entering data. Adding, searching is quite difficult by this manual process, since it involves work load and time consumption. Difficulties in maintenance of all records of journals. Can’t upload the latest updates of journals.No use of web services. No Security of Data.
                        </p>
                        
                        <p>
                            To make easy management of journal and easy paper submission and also easy monitoring paper status,the online journal management is very efficient.
                        </p>
                        
                        <p>  
                            The system is much easier and flexible. More secure. It Requires less overhead and it is very efficient. Editor can manage the whole system. Readily upload the latest updates, allows user to download the alerts by clicking the url.
                        </p>
                        
                        <p>
                            The outcome of  Journal Management System is to create a program which is used to Keep record of journal.It is a web-based information system for management of journals. Journal management will requires exchange of information between many participants in the publishing process, including authors, reviewers, editors, and collectors.
                        </p>
                        
                        <p>
                            Author will create an account by registration. Article submission process carries out the paper and other information which will  be uploaded against a paper id. The Reviewer panel is simple,which will allow the authorized reviewer to just download the paper and to submit a reviewer report.
                        </p>
                        
                        <p>
                            A paper handling panel by editor will help the editor to assign and authorize a reviewer to access the respective articles. Journal information will contain the information about the journal's past volumes,recent published articles, scope of the journal,a member to move to a different panel and a notice board.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <hr>
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-6 col-12">
            <div class = "card shadow-lg">
            <img src="img/journal.jpg" alt="" style = "width:100%; height: 308px;">
            </div>
        </div>
        <div class="col-lg-6 col-12" style = "text-align:justify">
            <div class = "card shadow-lg">
                <div class="card-header">
                    <h3 class = "text-center">NAZRUL JOURNAL</h3>
                </div>
                <div class="card-body text-justify">
                    <p>
                      Nazrul journal is a pioneering attempt to preserve international research papers on Bengal’s rebel poet Kazi Nazrul Islam’s life and his literary contributions in the country.
                    </p>
                    <p>
                        That preserves collection of research and analytical contributions by a galaxy of professors, Nazrul researchers and writers from different countries.
                    </p>
                       
                    <p>
                        Edited by Director of Nazrul Institute, Trishal & Director, NCSCS; Joint Publication: Jatiya Kobi Kazi Nazrul Islam University, Trishal & Kazi Nazrul University, Asansol
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $select_new_paper = "SELECT * FROM `new_paper` WHERE `published_status` = '1' ORDER BY `updated_at` DESC LIMIT 3 ";
    $run_select_new_paper = mysqli_query($conn, $select_new_paper);
    
    // jdi recent kono paper publish hoy tahole recent paper show korbo.
    
    if(mysqli_num_rows($run_select_new_paper)>0)
    {
      ?>
      <div class="container">
        <div class="row mt-4 mb-5 justify-content-center" style = "text-align:justify">
            <hr>
            <h1 class = "text-center mb-3">Recent Papers</h1>
            <?php 
                while($row = mysqli_fetch_assoc($run_select_new_paper))
                {
                    ?>
                    <div class="col-lg-4 col-12">
                        <div class = "card shadow-lg">
                            <div class="card-header">
                                <h3 class = "text-center"><?php echo $row['paper_title'] ?></h3>
                            </div>
                              
                            <div class="card-body">
                              <p><?php echo $row['paper_abstract']?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            ?>
            
        </div>
    </div>
      <?php 
    }

?>

<?php include 'footer.php'?>
