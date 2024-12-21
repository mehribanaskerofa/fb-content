<?php
class Url
{
    public function getData(string $url): string
    {
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
        return $html;
    }

}