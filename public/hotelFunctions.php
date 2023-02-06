<?php

use GuzzleHttp\Exception\ClientException;

function checkSelectedDate()
{
  $arrivalDate =  $_POST['arrivalDate'];
  $departureDate = $_POST['departureDate'];
  if ($arrivalDate && $departureDate != null) {
    if ($arrivalDate != $departureDate) {
      if ($arrivalDate < $departureDate) {
        echo 'good date <br>';
        return true;
      } else {
        echo ('Departure date most be after arrival');
      }
    } else {
      echo ('arrival and departure date cant be the same <br>');
    }
  } else {
    echo ('you have to select a date <br>');
  }
}

function checkValid()
{
  require __DIR__ . '/../vendor/autoload.php';
  $enterdCode = $_POST['transferCode'];
  $totalCost = (int)$_POST['totalCosts'];
  $client = new GuzzleHttp\Client(['verify' => false]);

  $url = 'https://www.yrgopelago.se/centralbank/transferCode';

  try {
    $response = $client->post($url, ['form_params' => [
      'transferCode' => $enterdCode,
      'totalCost' => $totalCost
    ],]);
  } catch (ClientException $e) {
    echo $e->getMessage();
  }
  if ($response->getBody() != false || Null) {
    echo 'work <br>';
    return true;
  } else {
    echo 'Please enter a valid transfer code.';
  }
}

function Deposit()
{
  $client = new GuzzleHttp\Client(['verify' => false]);
  $user = 'Styrbjörn';
  $enterdCode = $_POST['transferCode'];
  $url = 'https://www.yrgopelago.se/centralbank/deposit';

  try {
    $response = $client->post($url, ['form_params' => [
      'user' => $user,
      'transferCode' => $enterdCode
    ],]);
  } catch (ClientException $e) {
    echo $e->getMessage();
  }
  if ($response->getBody() != false || NULL) {
    echo 'work 2 <br>';
    return true;
  } else {
    echo 'transfercode could not be deposited';
  }
}

if (checkSelectedDate()) {
  if (checkValid()) {
    if (Deposit()) {
      echo 'done';
    } else {
      return;
    }
  } else {
    return;
  }
} else {
  return;
}
