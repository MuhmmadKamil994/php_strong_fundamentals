<?php
include "db.php";
session_start();

$user_id   = $_POST['user_id'];
$username  = trim($_POST['username']);
$firstname = trim($_POST['firstname']);
$lastname  = trim($_POST['lastname']);
$country   = trim($_POST['country']);
$postal    = trim($_POST['postalcode']);
$city      = trim($_POST['city']);

$sql = "SELECT info_id FROM user_information WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $update = $conn->prepare("UPDATE user_information 
        SET username=?, firstname=?, lastname=?, country=?, postalcode=?, city=? 
        WHERE user_id=?");
    $update->bind_param("ssssssi", $username, $firstname, $lastname, $country, $postal, $city, $user_id);
    $update->execute();
    $update->close();
} else {
    $insert = $conn->prepare("INSERT INTO user_information 
        (user_id, username, firstname, lastname, country, postalcode, city) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("issssss", $user_id, $username, $firstname, $lastname, $country, $postal, $city);
    $insert->execute();
    $insert->close();
}

$stmt->close();
$conn->close();

header("Location: ../LoginForm/dashboard_view.php");
exit();
