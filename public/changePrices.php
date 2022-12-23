<?php
function changePrices()
{
    $prices = $_POST;
    $i = 0;
    foreach ($prices as $price) {
        $i++;
        if ($price != null) {
            if (is_numeric($price)) {
                $jsonString = file_get_contents('prices.json');
                $data = json_decode($jsonString, true);
                echo ($data['value' . $i] . '<br>');
                echo ($price . '<br>');

                $data['value' . $i] = $price;
                $newJsonString = json_encode($data);
                file_put_contents('prices.json', $newJsonString);
            }
        }
    }
    header("Location: https://nordberg.one/Shirogane/admin.html");
}
changePrices();
