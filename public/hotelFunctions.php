<?php
function checkSelectedDate()
{
  $arrivalDate =  $_POST['arrivalDate'];
  $departureDate = $_POST['departureDate'];
  if ($arrivalDate && $departureDate != null) {
    if ($arrivalDate != $departureDate) {
      echo ('continue <br>');
    } else {
      echo ('arrival and departure date cant be the same <br>');
    }
    checkValid();
  } else {
    echo ('you have to select a date <br>');
  }
}

function checkValid()
{
  require __DIR__ . '/../vendor/autoload.php';
  $enterdCode = $_POST['transferCode'];
  $totalCost = $_POST['totalCosts'];

  $client = new GuzzleHttp\Client(['verify' => false]);

  $url = 'https://www.yrgopelago.se/centralbank/transferCode';

  if ($client->post($url, ['transferCode' => $enterdCode, 'totalcost' => $totalCost]) != false) {
    echo ('work');
  } else {
    echo ('no work');
  }
}

function sendJSON()
{
}

checkSelectedDate();
// things made by HANS dont know if its needed
// function connect(string $dbName): object
// {
//     $dbPath = __DIR__ . '/' . $dbName;
//     $db = "sqlite:$dbPath";

//     // Open the database file and catch the exception if it fails.
//     try {
//         $db = new PDO($db);
//         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     } catch (PDOException $e) {
//         echo "Failed to connect to the database";
//         throw $e;
//     }
//     return $db;
// }

// function guidv4(string $data = null): string
// {
//     // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
//     $data = $data ?? random_bytes(16);
//     assert(strlen($data) == 16);

//     // Set version to 0100
//     $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
//     // Set bits 6-7 to 10
//     $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

//     // Output the 36 character UUID.
//     return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
// }

// function isValidUuid(string $uuid): bool
// {
//     if (!is_string($uuid) || (preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid) !== 1)) {
//         return false;
//     }
//     return true;
// }
