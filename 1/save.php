<?php
session_start();

// Db connection configuration
include '../connection.php';

$start   = $_POST['start'];
$end = $_POST['end'];
$today=date("Y-m-d");
$return['error'] = false;

if (!$return['error']) {
  $result = mysqli_query($connect, "SELECT * FROM astra");

  while ($row = mysqli_fetch_array($result)) {
    $vzemane = $row['Start'];
    $vrashtane = $row['End'];

    if (($start >= $vzemane && $start <= $vrashtane) || ($end <= $vrashtane && $end >= $vzemane)) {
    	$return['msg'] = 'busy';
    } else {
    	$return['msg'] = 'free';
    }
    //$return['msg'] = $end;
  }
}

echo json_encode($return);
?>
