<?php
require_once './classes/Validation.php';
require_once './classes/Url.php';
require_once './classes/Convert.php';

$redirectUrl='index.html';
$url = (new Validation())->validate($_POST["url"],$redirectUrl);

$html=(new Url())->getData($url);

$metas=(new Convert())->getMeta($html);

$fb = [];

foreach ($metas as $meta) {
    if ($meta->hasAttribute('property') && str_starts_with($meta->getAttribute('property'), 'og:') && $meta->hasAttribute('content')) {
        $fb[$meta->getAttribute('property')] = $meta->getAttribute('content');
    }
}

echo '<pre>';
echo json_encode($fb, JSON_PRETTY_PRINT);
