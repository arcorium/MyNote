<?php
require_once('../connection.php');
date_default_timezone_set('Asia/Jakarta');

session_start();

if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]){
    header("location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if (isset($_GET['id']))
    {
        $jadwal_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];

        $query = "DELETE FROM jadwal_pelajaran WHERE jadwal_id='$jadwal_id' AND user_id='$user_id'";
        $res = mysqli_query(connect(), $query);

        header('Location: index.php?res=5');
    }
}