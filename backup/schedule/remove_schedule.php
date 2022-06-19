<?php
require_once('connection.php');
date_default_timezone_set('Asia/Jakarta');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $jadwal_id = $_POST['jadwal_id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM jadwal_pelajaran WHERE jadwal_id='$jadwal_id' AND user_id='$user_id'";
    $res = mysqli_query(connect(), $query);
    $row = mysqli_num_rows($res);

    header('Location: index.php');
}