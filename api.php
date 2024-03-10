<?php

$client = $_GET["client"];

if ($client != "pc" && $client != "mobile") {
    http_response_code(400);
}

$json_file = "./{$client}.json";

if (!file_exists($json_file)) {
    http_response_code(404);
}

$json_context = file_get_contents($json_file);
$json = json_decode($json_context, true);

$url = $json[array_rand($json)];

header("Location: {$url}");

?>