<?php
include('connection.php');

date_default_timezone_set('Asia/Jakarta');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_cfm = $_POST['password-cfm'];

    // Check password matching
    if (strcmp($password, $password_cfm))
    {
        header('Location: signup.php?res=3');
        return;
    }
    // Check null fields
    // Check if the username is already exist
    $queryCheck = "SELECT `user_id` FROM `user` WHERE `username`='$username' OR `email`='$email'";
    $row = mysqli_num_rows(mysqli_query(connect(), $queryCheck));
    // User already exist
    if ($row > 0)
    {
        header('Location: signup.php?res=2');
        return;
    }

    // Insert
    $query = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
    $status = mysqli_query(connect(), $query);

    if (!$status)
    {
        header('Location: signup.php?res=4');
        return;
    }


    header('Location: login.php?res=2');
}