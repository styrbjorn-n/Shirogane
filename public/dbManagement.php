<?php
session_start();
$passedData = $_SESSION['POST'];
session_unset();
session_destroy();

//print_r($passedData);

try {
  $db = new PDO('sqlite:database.sqlite');
  $sql = "INSERT INTO bookings (roomId, Customer, arrivalDate, departureDate)
  VALUES (:roomId, :Customer, :arrivalDate, :departureDate)";
  $statment = $db->prepare($sql);

  $roomId = $passedData['room'];
  $statment->bindValue(':roomId', $roomId, PDO::PARAM_INT);

  $customer = $passedData['customer'];
  $statment->bindValue(':Customer', $customer, PDO::PARAM_STR);

  $arrivalDate = $passedData['arrivalDate'];
  $statment->bindValue(':arrivalDate', $arrivalDate, PDO::PARAM_STR);

  $departureDate = $passedData['departureDate'];
  $statment->bindValue(':departureDate', $departureDate, PDO::PARAM_STR);

  $success = $statment->execute();
  if ($success) {
    echo 'Your stay has been successfully booked.';
  } else {
    echo 'Sorry something went wrong';
  }
  $db = null;
} catch (PDOException $e) {
  echo 'We had an error: ' . $e->getMessage() . '<br>';
}
