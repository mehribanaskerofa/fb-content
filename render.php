<?php

if (empty($_POST["url"]) || !isset($_POST["url"])) {
    header("Location: index.html");
    exit;
}

$url = $_POST["url"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$html = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);


if (empty($html)) {
    echo $error;
    exit;
}

$dom = new DOMDocument();
@$dom->loadHTML($html);

$metas = $dom->getElementsByTagName('meta');

$fb = [];

foreach ($metas as $meta) {
    if ($meta->hasAttribute('property') && $meta->hasAttribute('content')) {
        $fb[$meta->getAttribute('property')] = $meta->getAttribute('content');
    }
}

echo '<pre>';
echo json_encode($fb, JSON_PRETTY_PRINT);
