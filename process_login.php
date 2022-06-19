<?php
require_once('connection.php');
date_default_timezone_set('Asia/Jakarta');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT `user_id`, `last_login` FROM user WHERE (username='$username' AND password='$password') OR (`email`='$username' AND `password`='$password')";
    $res = mysqli_query(connect(), $query);
    $row = mysqli_num_rows($res);

    $_SESSION['last_login'] = null;
    $user_id = -1;
    if ($row > 0)
    {
        $arr = mysqli_fetch_array($res);
        $user_id = $arr['user_id'];
        $_SESSION['last_login'] = new DateTime($arr['last_login']);
        // Update last_login time
        $query = "UPDATE user SET `last_login`=current_timestamp() WHERE `user_id`='$user_id';";
        $res = mysqli_query(connect(), $query);
        if (!$res)
        {
            echo 'Failed to query data';
            return;
        }

        $_SESSION['user_id'] = $user_id;
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $username;  


        header('Location: dashboard/index.php');
    }
    else
    {
        header('Location: login.php?res=1');    // No match username or email with password
    }
}