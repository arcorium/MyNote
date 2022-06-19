<?php
require_once('../connection.php');
date_default_timezone_set('Asia/Jakarta');

session_start();
  // check session
if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]){
    header("location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $subject = $_POST['subject'];
    $day_id = $_POST['day'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $user_id = $_SESSION['user_id'];

    // Check subject existence
    $query = "SELECT `jadwal_id` FROM jadwal_pelajaran WHERE nama_jadwal='$subject'";
    $res = mysqli_query(connect(), $query);
    $row = mysqli_num_rows($res);
    if ($row > 0)
    {
        header('Location: index.php?res=2');   // Already exist
        return;
    }

    $query = "SELECT `jadwal_id` FROM jadwal_pelajaran WHERE waktu_mulai='$time_start' OR waktu_selesai='$time_end'";
    $res = mysqli_query(connect(), $query);
    $row = mysqli_num_rows($res);
    if ($row > 0)
    {
        header('Location: index.php?res=3');   // Time Crash
        return;
    }

    // Insert
    $query = "INSERT INTO `jadwal_pelajaran` (`user_id`, `nama_jadwal`, `day_id`, `waktu_mulai`, `waktu_selesai`) 
                VALUES ('$user_id', '$subject', '$day_id', '$time_start', '$time_end')";
    $status = mysqli_query(connect(), $query);

    if (!$status)
    {
        header('Location: index.php?res=4'); // error Internal
        return;
    }

    header('Location: index.php?res=0');
}