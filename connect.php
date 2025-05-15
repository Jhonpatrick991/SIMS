<?php
$con = mysqli_connect("localhost", "SIMS", "Sims@123", "SIMS");

if(!$con) {
    die("Connection Failed". mysqli_connect_error());
}
?>