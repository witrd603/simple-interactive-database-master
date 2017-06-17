<?php

  <form action="register-page.php" method= "post">
  
  <p><label" for= "fname">First Name:</label>
  <input id= "fname" type="text" name= "fname" size="30" maxlength= "30">
  value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
  
    <p><label for= "lname">Last Name:</label>
  <input id= "lname" type="text" name= "lname" size="30" maxlength= "40">
  value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
  
    <p><label for= "email">Email Address:</label>
  <input id= "email" type="text" name= "fname" size="30" maxlength= "60">
  value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
  
    <p><label for= "psword1">Password:</label>
  <input id= "psword1" type="psword" name= "psword1" size="12" maxlength= "12">
  value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>">&nbsp;
  Between 8 and 12 characters.</p>
  
    <p><label for= "psword2">Password:</label>
  <input id= "psword2" type="psword" name= "psword2" size="12" maxlength= "12">
  value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>"></p>
  
  
?>
