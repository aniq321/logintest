<?php
session_start();

include "db_conn.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $uname = $_POST['user_name'];
    $pass = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $user_id = random_num(20);
        $query = "insert into users (user_name,password,name) values ('$user_name','$password','$name') ";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }
    else
    {
        echo "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>