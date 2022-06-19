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
    $jadwal_id = $_POST['jadwal_id'];

    $subject = $_POST['subject'];
    $day_id = $_POST['day'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $user_id = $_SESSION['user_id'];

    $query = "UPDATE jadwal_pelajaran SET nama_jadwal='$subject', day_id='$day_id', waktu_mulai='$time_start', waktu_selesai='$time_end'
    WHERE user_id='$user_id' AND jadwal_id='$jadwal_id'";
    $res = mysqli_query(connect(), $query);

    header('Location: index.php?res=6');
}