<?php
include('connection.php');

date_default_timezone_set('Asia/Jakarta');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $result = True;
    $username = check($_POST['username'], $result);
    $password = check($_POST['password'], $result);

    if ($result)
    {
        $query = "SELECT `user_id` FROM user WHERE `username`='$username' AND `password`='$password'";
        $res = mysqli_query(connect(), $query);
        $row = mysqli_num_rows($res);
        if ($row > 0)
        {
            $user_id = mysqli_fetch_array($res)['user_id'];
            // Update last_login time
            $query = "UPDATE user SET `last_login`=current_timestamp() WHERE `user_id`='$user_id';";
            $res = mysqli_query(connect(), $query);
            if (!$res)
            {
                echo 'Failed to update data';
            }

            echo "$user_id";
        }
        else
        {
            header('Location: login.php?res=0');
        }

    }
    else
    {
        header('Location: login.php?res=1');
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