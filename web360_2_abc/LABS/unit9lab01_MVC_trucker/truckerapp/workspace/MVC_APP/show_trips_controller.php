<?php 
include('show_trips_service.php');

$showTripsService = new ShowTripsService();
$tripArrayModel = $showTripsService->getTripArray();

session_start();
$_SESSION["trips"] = $tripArrayModel;

header("location: show_trips_view.php");
?>