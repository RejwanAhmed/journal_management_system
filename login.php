
<?php include 'header.php'?>
<div class="container">
  <div class="row mt-3 mb-4 justify-content-center">
    <div class="col-lg-5 col-md-8 col-12">
      <form action="" method = "POST">
        <div class="card text-white bg-light shadow mb-2" >
          <div class="card-header card_header text-center">
            <h4 ><i class="fa-solid fa-right-to-bracket"></i> Login</h4>
          </div>
      
          <div class="card-body">
            <p class = "text-danger text-center fw-bold"><i>To Submit An Article You Should Login First</i></p>
            <!-- Email input -->
            <div class="input-group mt-2">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                <input class = "form-control" type="email" name = "email" placeholder="Enter Your Email" value = "
                <?php if(isset($_POST['email']))
                {
                    echo $_POST['email'];
                }?>" required>
            </div>
            
            <!-- Password Input -->
            <div class="input-group mt-2">
              <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
              <input class = "form-control" type="password" name = "password" placeholder="Enter Password" value = "<?php if(isset($_POST['password']))
              {
                  echo $_POST['password'];
              }?>" required>
              
            </div>
            
            <!-- Select Author/Editor/Reviewer Input -->
            <div class="input-group mt-2 ">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image-portrait"></i></span>
                <select class = "form-control" name="select_author_reviewer_main_editor_asso_editor" id="" required>
                  <option value="">Please Select To Login</option>
                  <option <?php if(isset($_POST['select_author_reviewer_main_editor_asso_editor']) && $_POST['select_author_reviewer_main_editor_asso_editor']=="Author") echo "selected"; ?>>Author</option>
                  <option <?php if(isset($_POST['select_author_reviewer_main_editor_asso_editor']) && $_POST['select_author_reviewer_main_editor_asso_editor']=="Reviewer") echo "selected";?>>Reviewer</option>
                  <option <?php if(isset($_POST['select_author_reviewer_main_editor_asso_editor']) && $_POST['select_author_reviewer_main_editor_asso_editor']=="Main Editor") echo "selected";?>>
                  Main Editor
                  </option>
                  <option <?php if(isset($_POST['select_author_reviewer_main_editor_asso_editor']) && $_POST['select_author_reviewer_main_editor_asso_editor']=="Associative Editor") echo "selected";?>>
                  Associative Editor
                  </option>
                </select>
            </div>
            
            <!-- Captcha -->
            <div class="form-group">
              <p class="mt-2 text-dark fw-bold">Type Below this code: </p>
                
              <p class = "text-center text-success form-control" style="font-family: 'Courgette', cursive;letter-spacing:15px;font-size:20pt;padding:10px;user-select: none;"> 
              <?php //$Random_code=rand();
              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $random_code='';
              for ($i = 0; $i < 6; $i++) {
                  $index = rand(0, strlen($characters) - 1);
                  $random_code .= $characters[$index];
              } 
              echo $random_code; ?></p>
              <input type="hidden" name = "random_code" value = "<?php echo $random_code ?>">
            </div>
            <div class="input-group">
              <input  type="text" class="form-control" name="captcha" placeholder="Please Enter The Above Captcha" required>
              <br>
            </div>
            <p id = "error" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
            <!-- Submit Button -->
            <div class="input-group mt-2">
                <input class = "form-control btn btn-success fw-bold" type="submit" name = "submit" value = "Login">
            </div>
          
            <div class = "mt-1 text-center">
              <a href="" class="text-decoration-none text-danger">Forgot your password?</a>
              <p class = "text-dark">Not registered yet? <a href="register.php" class="text-decoration-none fw-bolder">Register now.</a> </p>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'footer.php'?>

<?php 
  if(isset($_POST['submit']))
  {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    $select_author_reviewer_main_editor_asso_editor = mysqli_real_escape_string($conn, $_POST['select_author_reviewer_main_editor_asso_editor']);
    $captcha = mysqli_real_escape_string($conn, $_POST['captcha']);
    $random_code = $_POST['random_code'];
    
     // ki hisabe register korte chacche tar jonno if else dewa
     if($select_author_reviewer_main_editor_asso_editor=="Author")
     {
        $person = "author";
     }
     else if($select_author_reviewer_main_editor_asso_editor=="Reviewer")
     {
        $person = "reviewer";
     }
     else if($select_author_reviewer_main_editor_asso_editor == "Main Editor")
     {
        $person = "main_editor";
     }
     else
     {
        $person = "associative_editor";
     }
    // table name
    $person_table_name = $person."_information";
     
    // jei table e data entry korbe tar column er name
    $person_column_email = $person."_email";
    $person_column_password = $person."_password";
    $person_column_status = $person."_status";
     
     
    
    $select_from_person_table = "SELECT * FROM `$person_table_name` WHERE `$person_column_email` = '$email' AND `$person_column_password` = '$password'";
    if($person == "associative_editor" || $person == "reviewer")
    {
      $select_from_person_table.= "AND `$person_column_status` = '1'";
    }
    $run_select_from_person_table = mysqli_query($conn, $select_from_person_table);
    
    $num_rows = mysqli_num_rows($run_select_from_person_table);
    $res = mysqli_fetch_assoc($run_select_from_person_table);
    // Captcha checking;
    // echo $captcha." = ".$random_code;
    if($captcha != $random_code)
    {
      ?>
        <script>
          document.getElementById('error').style = "display: block";
          document.getElementById('error').innerHTML = "!!Captcha Does Not Match";
        </script>
      <?php 
      exit();
    }
    else if($num_rows==0)
    {
      ?>
      <script>
        document.getElementById('error').style = "display: block";
        document.getElementById('error').innerHTML = "!!Wrong Email or Password or ID may not Approved";
      </script>
      <?php 
      exit();
    }
    else
    {
      $_SESSION['person'] = $person;
      $_SESSION[$person.'_id'] = $res['id']; 
      $_SESSION[$person.'_name'] = $res[$person.'_name'];
      $_SESSION[$person.'_email'] = $res[$person.'_email'];
      ?>
      <script>
        window.alert("Login Success");
        window.location = "<?php echo $person ?>/index.php";
      </script>
      <?php
    }
  }
?>