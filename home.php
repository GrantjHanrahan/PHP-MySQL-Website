<!DOCTYPE html>
<html>
<head>
<title>PHP site</title>
</head>
<?php 
session_start();
if($_SESSION['user']){

} else {
    header("location: index.php"); // redirects if user is not logged in
}

$user = $_SESSION['user']; // assigns user value
?>
<body>
    <h2>Home Page</h2>

    <hello>
    <a href="logout.php">Click here to go</a><br/><br/>
    <form action="add.php" method="POST">
        Add more to list: <inout type="text" name="details" /> <br/>
        Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
        <input type="submit" value="Add to list"/>
    </form>
    <h2 align="center">My list</h2>    
