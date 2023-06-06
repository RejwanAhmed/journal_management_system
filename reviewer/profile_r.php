<?php include('reviewer_header.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Update Profile</h3>
                </div>
                <div class="card-body">
                    <?php 
                        // first get the profile information
                        $select_info = "SELECT * FROM `reviewer_information` WHERE `id` = '$_SESSION[reviewer_id]'";
                        $run_select_info = mysqli_query($conn, $select_info);
                        $res_select_info = mysqli_fetch_assoc($run_select_info);
                    ?>
                    <form action="" method = "POST">
                    <div class="row justify-content-center mt-3 text-dark ">
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <label for="" class = "mb-2"><b>Enter Name:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                    <input class = "form-control" type="text" name = "name" placeholder="Enter Name" value = "<?php 
                                    if(isset($_POST['name']))
                                    {
                                        echo $_POST['name'];
                                    }
                                    else
                                    {
                                        echo $res_select_info['reviewer_name'];
                                    }
                                    ?>" required>
                                </div>
                                
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "mb-2"><b>Please Select Designation:</b></label>
                                <br>
                            <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image-portrait"></i></span>
                                    <select class = "form-control" name="designation" id="" required>
                                        <option value="" >Please Select Designation</option>
                                        <option <?php if(isset($_POST['designation']) && $_POST['designation']=="Professor") echo "selected";  
                                        else if($res_select_info['reviewer_designation']=="Professor")
                                        {
                                            echo "selected";
                                        }?>>Professor</option>
                                        <option <?php if(isset($_POST['designation']) && $_POST['designation']=="Associate Professor") echo "selected";  else if($res_select_info['reviewer_designation']=="Associate Professor")
                                        {
                                            echo "selected";
                                        }?>>Associate Professor</option>
                                        <option <?php if(isset($_POST['designation']) && $_POST['designation']=="Assistant Professor") echo "selected";
                                        else if($res_select_info['reviewer_designation']=="Assistant Professor")
                                         {
                                             echo "selected";
                                         }?>>Assistant Professor</option>
                                        <option <?php if(isset($_POST['designation']) && $_POST['designation']=="Lecturer") echo "selected"; 
                                         else if($res_select_info['reviewer_designation']=="Lecturer")
                                         {
                                             echo "selected";
                                         }?>>Lecturer</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "text-dark mb-2"> <b>Enter University Name:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-building-columns"></i></span>
                                    <input class = "form-control" type="text" name = "university_name" placeholder="Enter University Name" value = "<?php if(isset($_POST['university_name']))
                                    {
                                        echo $_POST['university_name'];
                                    }
                                    else
                                    {
                                        echo $res_select_info['reviewer_university_name'];
                                    }
                                    ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row justify-content-center mt-3">
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "text-dark mb-2"> <b>Enter Email:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                    <input class = "form-control" type="email" name = "email" placeholder="Enter Email" value = "
                                    <?php if(isset($_POST['email']))
                                    {
                                        echo $_POST['email'];
                                    }
                                    else
                                    {
                                        echo $res_select_info['reviewer_email'];
                                    }
                                    ?>" required>
                                </div>
                                <p id = "email" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "text-dark mb-2"> <b>Enter Contact No:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                    <input class = "form-control" type="text" name = "contact_no" placeholder="Enter Contact No" value = "<?php if(isset($_POST['contact_no']))
                                    {
                                        echo $_POST['contact_no'];
                                    }
                                    else
                                    {
                                        echo $res_select_info['reviewer_contact_no'];
                                    }
                                    ?>" required>
                                </div>
                                <p id = "contact_no" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "text-dark mb-2"> <b>Country:</b> </label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-flag"></i></span>
                                    <?php
        								$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                                    ?>                      
                                    <select name="country" id="" class = "form-select" required>
                                        <option value="" >Please Select Country</option>
                                        <?php
                                        foreach($countries as $key => $value):
                                        echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center mt-3 text-dark "> 
                            <div class="col-lg-4 col-md-4 col-12">
                                    <label for="" class = "mb-2"><b>Old Password:</b></label>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                        <input class = "form-control" type="password" name = "old_password" placeholder="Enter Old Password" value = "<?php if(isset($_POST['old_password']))
                                        {
                                            echo $_POST['old_password'];
                                        }?>" required>
                                    </div>
                                    <p id = "old_password" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
                                </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "mb-2"><b>New Password:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                    <input class = "form-control" type="password" name = "password" placeholder="Enter New Password" value = "<?php if(isset($_POST['password']))
                                    {
                                        echo $_POST['password'];
                                    }?>" required>
                                </div>
                                <p id = "password" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-12">
                                <label for="" class = "mb-2"><b>Confirm Password:</b></label>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                                    <input class = "form-control" type="password" name = "confirm_password" placeholder="Enter Password Again" value = "<?php if(isset($_POST['confirm_password']))
                                    {
                                        echo $_POST['confirm_password'];
                                    }?>" required>
                                </div>
                                <p id = "confirm_password" class = "fw-bolder bg-warning text-dark text-center mt-1" style = "display:none"></p>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center mt-3">
                            <div class="col-lg-4 col-md-6 col-12" >
                                <div class="input-group mt-2">
                                    <input class = "form-control btn btn-success fw-bold" type="submit" value = "Update" name = "submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('reviewer_footer.php')?>
<?php 
    if(isset($_POST['submit']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);
        $university_name = mysqli_real_escape_string($conn, $_POST['university_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
        
        // author hisabe jehetu login ache tai person = author diye rakhsi.
        $person = "reviewer";
        
        // table name
        $person_table_name = $person."_information";
        
        // jei table e data entry korbe tar column er name
        $person_column_user_name = $person."_name";
        $person_column_designation = $person."_designation";
        $person_column_university_name = $person."_university_name";
        $person_column_email = $person."_email";
        $person_column_contact_no = $person."_contact_no";
        $person_column_country = $person."_country";
        $person_column_password = $person."_password";
        
        // Query to check whether email or contact_no exists or not
        $select_to_validate_email_contact_no = "SELECT * FROM `$person_table_name` WHERE (`$person_column_email` = '$email') OR (`$person_column_contact_no` = '$contact_no')";
        $run_select_to_validate_email_contact_no = mysqli_query($conn, $select_to_validate_email_contact_no);
     
        
        // Start Of Validation
        while($value = mysqli_fetch_assoc($run_select_to_validate_email_contact_no))
        {
            if($value['reviewer_email']==$email && $value['id']!=$_SESSION['reviewer_id'])
            {
                ?>
                    <script>
                        document.getElementById('email').style = "display:block";
                        document.getElementById('email').innerHTML = "!!Email Already Exists";
                    </script>
                <?php
                exit();
            }
            if($value['reviewer_contact_no']==$contact_no && $value['id']!=$_SESSION['reviewer_id'])
            {
                ?>
                    <script>
                        document.getElementById('contact_no').style = "display:block";
                        document.getElementById('contact_no').innerHTML = "!!Contact Already Exists";
                    </script>
                <?php
                exit();
            }
        }
        if(md5($old_password)!=$res_select_info['reviewer_password'])
        {
            ?>
            <script>
                document.getElementById('old_password').style = "display:block";
                document.getElementById('old_password').innerHTML = "!!Old Password Does Not Match";
            </script>
            <?php
            exit();
            
        }
        if(strlen($password)<8 || strlen($confirm_password) <8)
        {
            ?>
            <script>
                document.getElementById('password').style = "display:block";
                document.getElementById('password').innerHTML = "!!Password Must Be Greater Than 8 Characters";
                
                document.getElementById('confirm_password').style = "display:block";
                document.getElementById('confirm_password').innerHTML = "!!Password Must Be Greater Than 8 Characters";
            </script>
            <?php
            exit();
        }
        else if($password!=$confirm_password)
        {
            ?>
            <script>
                document.getElementById('password').style = "display:block";
                document.getElementById('password').innerHTML = "!!Password And Confirm Password Does Not Match";
                
                document.getElementById('confirm_password').style = "display:block";
                document.getElementById('confirm_password').innerHTML = "!!Password And Confirm Password Does Not Match";
            </script>
            <?php
            exit();
        }
        else 
        {
            // If all validation passes Hash the password;
            $password = md5($password);
        }
        // End Of Validation
      
        // If all validation Passes now insert using Prepared Statement
        $update_person_table = "UPDATE `$person_table_name` SET `$person_column_user_name` = '$name', `$person_column_designation` = '$designation', `$person_column_university_name` = '$university_name', `$person_column_email` = '$email', `$person_column_contact_no` = '$contact_no', `$person_column_country` = '$country', `$person_column_password` = '$password' WHERE `id` = '$_SESSION[reviewer_id]'";
        
        $run_update_person_table = mysqli_query($conn, $update_person_table);
        
        if($run_update_person_table)
        {
            ?>
                <script>
                    window.alert("Profile Updated");
                    window.location = "index.php";
                </script>
            <?php 
            
        }
        
    }
?>
