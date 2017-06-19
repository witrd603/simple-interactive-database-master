<!doctype html>
<html lang=en>
    <head>
        <title>Register page</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="includes.css">
        <style type="text/css">
        p.error { color:red; font-size:105; font-weight:bold; text-align:center;}
          </style>
          </head>
          <body>
          <div id="container">
          <?php include("header.php"); ?>
                <?php include("nav.php"); ?>
                  <?php include("info-col.php"); ?>
                      <div id="content"><!--Start of the page content.-->
                          <p>
                          <?php
                          //This script performs an INSERT query that adds a record to the users table.
                          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                              $errors = array(); //Initialize an error array.
                              //Was the first name entered?
                              if (empty($_POST['fname'])) {
                                  $errors[] = 'You did not enter your first name';
                              }
                              else {$fn = trim($_POST['fname']);
                              }
                              // Was the last name entered?
                              if (empty($_POST['lname'])) {
                                  $errors[] ='You did not enter your last name.';
                              }
                                    else {$ln = trim($_POST['lname']);
                          }
                          //Was an email address entered?
                                   if (empty($_POST['email'])) {
                                  $errors[] ='You did not enter your email address.';
                                  }
                                     else {$e = trim($_POST['email']);
                                     }
                                     //Did the two passwords match?
                                        if (!empty($_POST['psword1'])) {
                                            if ($_POST['psword1'] !=$_POST['psword2'])  {
                                                   $errors[] ='Your passwords where not the same.';
                                            }
                                                 else {$p =trim($_POST['psword1']);
                                  }
                                  }
                                  else {$errors[]= 'You did not enter your password';
                                  }
                                  //Start of the SUCCESFUL SECTION. i.e. all the fields were filled out
                                  if (empty($errors)) {//if no problems encountered, register user in the database
                                  require ('./mysqli_connect.php');//Connect to the database.
                                  //Make the query
                                  $q = "INSERT INTO users (user_id, fname, lname, email, psword, registration_date)
                                  VALUES ('', '$fn', '$ln', '$e', 'SHA1('$p'), NOW() )";
                                  $result= @mysqli_query($dbcon, $q); // Run the query.
                                  if ($result) {// If it ran OK.
                                  header ("location: register-thanks.php");
                                  exit();
                                  //End of SUCCESFUL SECTION
                                  }
                                  else {// If the form handler or database table contained errors
                                  //Display any error message
                                  echo '<h2>System Error</h2>
                                  <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
                                  //Debug the message:
                                  echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' .$q. '</p>';
                                   }//End of if clause ($result)
                                  mysqli_close($dbcon); // Close the database connection.
                                  //Include the footer and quit the script:
                                  include ('footer.php');
                                  exit();
                                  }
                                  else {//Display the errors
                                  echo '<h2>Error!</h2>
                                  <p class="error">The following error(s) occurred:<br>';
                                  foreach ($errors as $msg) {// Print each error.
                                  echo" - $msg<br>\n";
                                  }
                                  echo '</p><h3>Please try again. </h3><p><br></p>';
                                  }//End of if (empty($errors)) IF
                                  }// End of the main Submit conditional.
                                  ?>
                                  <h2>Register</h2>
                                  <!--Display the form on the screen-->
                                  <form action="register-page.php" method="post">

                                  <p><label class="label" for="fname">First Name:</label>
                                  <input id="fname" type="text" name= "fname" size="30" maxlength= "30"
                                  value= "<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"</p>

                                     <p><label class="label" for="lname">Last Name:</label>
                                  <input id="lname" type="text" name= "lname" size="30" maxlength= "40"
                                  value= "<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"</p>
                                  
                                     <p><label class="label" for="email">Email Address:</label>
                                  <input id="email" type="text" name= "email" size="30" maxlength= "60"
                                  value= "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"</p>
                                  
                                     <p><label class="label" for="psword1">Password:</label>
                                  <input id="psword1" type="psword" name= "psword1" size="12" maxlength= "12"
                                  value= "<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>"</p>
                                  
                                     <p><label class="label" for="psword2">Confirm Password:</label>
                                  <input id="psword2" type="psword" name= "psword2" size="12" maxlength= "12"
                                  value= "<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>"</p> 
                                  
                                     <p> <input id="submit" type= "submit" name="submit" value= "Register"></p>
                                  </form><!-- End of the page content. -->
                                  <?php include ('footer.php'); ?>
                                  </div>
                                  </div>
                              


          </body>
  </html>