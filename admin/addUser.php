<?php
session_start();

if (!isset($_SESSION['nID']))
{
    header("Location: admin-login.php");
    die();
} 

/*
file: addUser.php
author: Shane Zentz
desc: this file is used to create a new user object using the User class within BS-CMS.
*/
require 'userClass.php';
require_once('activityClass.php');

// create new user object
$user = new User();
$act = new Activity();

// get the data from the form submit
$newUser = $_POST['addUser'];
$newPass = $_POST['addPassword'];

// b4 calling the method just check the vars first....
//echo 'User: '.$newUser.'   Pass:'.$newPass.'<br>';

// call the addUser method to create the new user...
// echo alert if the user was created, an error message otherwise...
if ($user->createUser ($newUser, $newPass))
{
  $act->addActivity($_SESSION["username"], "Added new user: ".$newUser);
  header("refresh:2; index.php"); // really should be a fully qualified URI
  echo '<script type="text/javascript">alert("New User Added...");</script>';
}
else
{
	
}
?>