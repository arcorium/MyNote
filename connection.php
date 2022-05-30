<?php

function connect()
{
    $DB_HOST = 'localhost';
    // $DB_PORT = 3306;
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'mynote';

    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);

    if (!$con)
    {
        die('Connection Failed! ' . mysqli_error());
    }

    mysqli_select_db($con, $DB_NAME);
    
    return $con;
}
?>