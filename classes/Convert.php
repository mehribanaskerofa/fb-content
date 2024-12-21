<?php
class Convert
{
    public function getMeta(string $html): DOMNodeList   
    {
        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        
        $metas = $dom->getElementsByTagName('meta');
        return $metas;
    }
}