<?php
//This file provides the information for accessing the database and connecting
//to MySQL. It alsosets the language coding to utf-8
//First we define the constant:

DEFINE  ('DB_USER', 'horatio');
DEFINE  ('DB_PASSWORD', 'hmsvictory');
DEFINE  ('DB_HOST', 'localhost');
DEFINE  ('DB_NAME', 'simpleIdb');
// Next we assign the database connection to a variable that we will call$dbcon:
$dbcon =@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
//Finally, we set the language encoding as uf-8
mysqli_set_charset($dbcon, 'utf8');
?>
