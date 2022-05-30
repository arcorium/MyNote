<?php
include('connection.php');

date_default_timezone_set('Asia/Jakarta');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $result = True;
    $username = check($_POST['username'], $result);
    $password = check($_POST['password'], $result);
    $password_cfm = check($_POST['password-cfm'], $result);

    // Check password matching
    if ($password != $password_cfm)
        header('Location: signup?res=3');

    // Check null fields
    if ($result)
    {
        // Check if the username is already exist
        $queryCheck = "SELECT `user_id` FROM `user` WHERE `username`='$username'";
        $row = mysqli_num_rows(mysqli_query(connect(), $queryCheck));
        // User already exist
        if ($row > 0)
        {
           header('Location: signup.php?res=2');
           return;
        }

        // Insert
        $query = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password');";
        $status = mysqli_query(connect(), $query);

        if (!$status)
        {
            header('Location: signup.php?res=4');
            return;
        }


        header('Location: login.php');
    }
    else
    {
        header('Location: signup.php?res=1');
        // TODO: Use ajax instead!
        // 4 = Failed to create user
        // 3 = password not match
        // 2 = user already exist
        // 1 = empty field
        // 0 = wrong either username or password
    }
}

function check($data_, &$bool_)
{
    if (empty($data_))
        {
            $bool_ = False;
            return "NULL";
        }

    return trim($data_);
}