<?php
class Validation
{
    public function validate(string $input, string $redirectUrl): string
    {
        if (empty($input) || !isset($input)) {
            header("Location: ".$redirectUrl);
            exit;
        }
        return $input;
    }
}