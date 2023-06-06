<?php include('author_header.php')?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
          <div class="modal-body">
            <select class = "form-control" name="reviewer" id="">
                <?php 
                    $select = "SELECT * FROM `associative_editor_information`";
                    $run = mysqli_query($conn, $select);
                    while($row = mysqli_fetch_assoc($run))
                    {
                        ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['associative_editor_name']?></option>
                        <?php 
                    }
                ?>
            </select>
          </div>
          <div class="modal-footer">
                <input type="submit" name = "submit" value = "Submit">
          </div>
      </form>
      
    </div>
  </div>
</div>
<?php 
    if(isset($_POST['submit']))
    {
        echo $_POST['reviewer'];
        exit();
    }
?>
<?php include('author_footer.php')?>