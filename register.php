<!DOCTYPE html>
<html>
<head>
<title>PHP site</title>
</head>
<body>

    <h2>Registration Page</h2>
    <a href ="index.php">Click here to go back<br/><br/>
    <form action="register.php" method="POST">
        Enter Username: <input type="text" name="username" required="required" /> <br/>
        Enter Password: <input type="password" name="password" required="required" /> <br/>
        <input type="submit" value="Register" />
    </form>    

</body>
</html>

<?php 

// Check if the form has received a POST method when the submit button has been clicked
// $_POST gets the name coming from a POST method
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Encapsulates the input into a string to prevent inputs from SQL injections
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    mysql_connect("localhost", "root") or die(mysql_error()); // connect to server, or die() will display error msg if condition has not been met
    mysql_select_db("first_db") or die("Cannot connect to database"); // connect to database

    $query = mysql_query("Select * from users"); // query the users table
    while($row = mysql_fetch_array($query))// display all rows from query
    {
        $table_users = $row["username"]; // the first username row is passed on to $table_users, and so on until the query is finished
        if($username == $table_users)// checks if there are any matching fields
        {
            $bool = false; // sets bool to false
            Print '<script>alert("Username has been taken");</script>';// prompts the user
            Print '<script>window.location.assign("register.php");</script>';// redirects to register.php
        }
    }

    if($bool) // checks if bool is true
    {
        mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')"); // inserts the value to table users
        Print '<script>alert("Successfully registered");</script>';// prompts the user
        Print '<script>window.location.assign("register.php");</script>';// redirects to register.php
    }

    // echo "Username entered is: ". $username . "<br/>";
    // echo "Password entered is: ". $password;
}
?>