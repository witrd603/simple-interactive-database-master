<!doctype html>
<html lang=en>
<head>
<title>Change password</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p.error {color:red; font-size: 105%; font-weight: bold; text-align: center;}
</style>
</head>
<body>
<div id="container">
<?php include("header.php")?>
<?php include("nav.php")?>
<?php include("info-col.php")?>
<div id="content"><!-- Start of the change password page -->
<?php
    //This page lets users change their password.
    //Was the submit button clicked?
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        require ('mysqli_connect.php'); //Connect to the database
        $errors = array(); //Initialize the error array.
        
        //Check for an email address:
        if (empty($_POST['email'])) {
            $errors[] = 'You forgot to enter your email address.';
        }else{
            $e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
        }
        
        //Check for the current password:
        if (empty($_POST['psword'])){
            $errors[] = 'You forgot to enter your current password';
        }else{
            $p = mysqli_real_escape_string($dbcon, trim($_POST['psword']));
        }
        
        //Check for a new password and match against the confirmed password:
        if (!empty($_POST['psword1'])){
            if ($_POST['psword1'] != $_POST['psword2']){
            $errors[] = 'Your new password did not match the confirmed password';
        }else{
               $np = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
        }
    } else{
        $errors[] = 'You forgot to enter your new password';
    }
    
    if (empty($errors)) {// If no problems occured
    //Check that the user has entered the right email address/password combination:
    $q = "SELECT user_id FROM users WHERE (email= '$e' AND password= SHA1('$p') )";
    $result = @mysqli_query($dbcon, $q);
    )
        
    }
?>

